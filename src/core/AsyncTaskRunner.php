<?php

namespace Gest\Telegest\core;

use Gest\Telegest\interfaces\BotRunnerInterface;
use React\EventLoop\Factory;
use React\EventLoop\LoopInterface;

class AsyncTaskRunner implements BotRunnerInterface
{
    private static ?AsyncTaskRunner $instance = null;
    private ?LoopInterface $loop = null;

    public static function getInstance(): AsyncTaskRunner
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getLoop(): LoopInterface
    {
        if (!$this->loop)
        {
            $this->loop = Factory::create();
        }

        return $this->loop;
    }

    public function run(): self
    {
        $this->getLoop()->run();
        return $this;
    }

    public function addPeriodicTask(float $interval, callable $task): self
    {
        $this->getLoop()->addPeriodicTimer($interval, $task);
        return $this;
    }
}