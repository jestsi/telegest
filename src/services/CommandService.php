<?php

namespace Gest\Telegest\services;

use Gest\Telegest\models\Command;

class CommandService {
    public function createCommand(string $command, array $params = []) {
        $cmd = new Command($command, $params);
        if (!empty($params)) {
            $cmd->setParams($params);
        }
        return $cmd;
    }

    public function createFromMessageText(string $command)
    {
        $tempStorageCommand = explode(' ', $command);
        $command = new Command($tempStorageCommand[0], array_slice($tempStorageCommand, 1));
        return $command;
    }

    public function hasCommandParams(Command $command) {
        return $command->hasParams();
    }

    public function getCommandParams(Command $command) {
        return $command->getParams();
    }
}
