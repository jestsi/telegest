<?php

namespace Gest\Telegest\interfaces;

interface BotRunnerInterface
{
    public function addPeriodicTask(float $period, callable $task);
    public function run();
}