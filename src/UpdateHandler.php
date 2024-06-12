<?php

namespace Gest\Telegest;

use Gest\Telegest\core\AsyncTaskRunner;
use Gest\Telegest\core\Request;
use Gest\Telegest\core\UpdateSubject;
use Gest\Telegest\interfaces\BotRunnerInterface;
use Gest\Telegest\models\Message;
use Gest\Telegest\types\UpdateType;

class UpdateHandler extends UpdateSubject
{
    private BotRunnerInterface $taskRunner;

    public function __construct(BotRunnerInterface $taskRunner)
    {
        $this->taskRunner = $taskRunner;
    }

    public function registerCommand(string $command, callable $handler)
    {
        $this->attachCallable(UpdateType::Message, function($message) use ($command, $handler) {
            $message = new Message($message);
            if (trim(explode(' ', $message->text)[0]) === $command) $handler($message);
        });
    }

    protected function getUpdates(?int $offset = null, int $limit = 100, int $timeout = 0)
    {
        $params = [
            'offset' => $offset ?? $_SESSION['offset'] ?? null,
            'limit' => $limit,
            'timeout' => $timeout
        ];

        return Request::getInstance()->send('getUpdates', $params);
    }

    public function handleUpdates()
    {
        return $this->taskRunner
            ->addPeriodicTask(0.5, function () {
                $this->getUpdates()
                    ->then(
                        function ($updates) {              
                            if (empty($updates['result'])) return;
                            foreach($updates['result'] as $update)
                                foreach(UpdateType::cases() as $type)
                                {
                                    if (!isset($update[$type->value])) continue;

                                    $this->notify($type->value, $update[$type->value]);
                                    $_SESSION['offset'] = ($update['update_id'] + 1);
                                }
                        },
                        function (\Throwable $th) {
                            Config::getInstance()->getLogger()->error('Error on handleUpdates ' . $th->getMessage());
                        }
                    );
            });
    }
}