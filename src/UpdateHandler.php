<?php

namespace Gest\Telegest;

use Gest\Telegest\builders\UpdateModelMapBuilder;
use Gest\Telegest\core\Request;
use Gest\Telegest\core\UpdateSubject;
use Gest\Telegest\factory\UpdateModelFactory;
use Gest\Telegest\interfaces\BotRunnerInterface;
use Gest\Telegest\models\InlineQuery;
use Gest\Telegest\models\Message;
use Gest\Telegest\types\UpdateType;

class UpdateHandler extends UpdateSubject
{
    private BotRunnerInterface $taskRunner;
    private UpdateModelFactory $updateModelFactory;


    public function __construct(BotRunnerInterface $taskRunner, UpdateModelFactory $updateModelFactory)
    {
        $this->taskRunner = $taskRunner;
        $this->updateModelFactory = $updateModelFactory;
    }

    public function registerCommand(string $command, callable $handler)
    {
        $this->attachCallable(UpdateType::Message, function($message) use ($command, $handler) {
            $commandExplode = explode(' ', $message->text);

            if (trim($commandExplode[0]) !== $command) return;
            $handler($message, array_slice($commandExplode, 1));
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
        $updateModelFactory = &$this->updateModelFactory;
        return $this->taskRunner
        ->addPeriodicTask(0.5, function () use ($updateModelFactory)
        {
            $this->getUpdates()
            ->then(
                function ($updates) use ($updateModelFactory)
                {              
                    if (empty($updates['result'])) return;
                            foreach($updates['result'] as $update)
                                foreach(UpdateType::cases() as $type)
                                {
                                    if (!isset($update[$type->value])) continue;
                                    $this->notify($type->value, $updateModelFactory->create($type, $update[$type->value]));
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