<?php

namespace Gest\Telegest\models;

class Command
{
    protected string $command;
    protected array $params;

    public function __construct(string $command, array $params = [])
    {
        $this->command = $command;
        $this->params = $params;
    }

    public function hasParams() {
        return !empty($this->params);
    }

    public function getCommand() {
        return $this->command;
    }

    public function getParams() {
        return $this->params;
    }

    public function setParams(array $params)
    {
        $this->params = $params;
    }
}