<?php

namespace Gest\Telegest;

use Gest\Telegest\core\AsyncTaskRunner;
use Gest\Telegest\core\Request;
use Gest\Telegest\interfaces\RequestInterface;
use Gest\Telegest\types\TelegramMethods;

final class TGBot
{
    private ?UpdateHandler $_updateHandler = null;

    public function __construct()
    {
        try {
            $token = Config::getInstance()->get('token');
            if (!$token) throw new \Exception('Token was required in Config storage, pls set token!');
        } catch (\Throwable $th) {
            Config::getInstance()->getLogger()->error($th->getMessage());
        }
    }

    public function getUpdateHandler() : UpdateHandler
    {
        if (!$this->_updateHandler)
        {
            $this->_updateHandler = Config::getContainer()->get(UpdateHandler::class);
        }

        return $this->_updateHandler;    
    }

    public function run(): void
    {
        AsyncTaskRunner::getInstance()->run();
    }
}