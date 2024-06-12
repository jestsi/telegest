<?php

namespace Gest\Telegest\core;

use Gest\Telegest\interfaces\BotRunnerInterface;

class TaskRunner implements BotRunnerInterface
{
    private static ?TaskRunner $instance = null;
    private $runLoop = false;
    private $tasks = [];

    public static function getInstance() : TaskRunner
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function run()
    {
        $this->runLoop = true;
        while($this->runLoop)
        {
            foreach($this->tasks as $interval => $task)
            {
                sleep($interval);
                $task();
            }
        }
    }

    public function stop()
    {
        $this->runLoop = false;
    }

    public function addPeriodicTask(float $interval, callable $task): self
    {
        $this->tasks[$interval] = $task;
        return $this;
    }
}