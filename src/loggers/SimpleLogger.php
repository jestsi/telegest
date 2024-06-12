<?php

namespace Gest\Telegest\loggers;

use Gest\Telegest\loggers\BaseLogger;
use Gest\Telegest\types\LogLevel;

class SimpleLogger extends BaseLogger
{
    public function log(LogLevel $level, string $message, array $context = []) {
        echo strtoupper($level->value) . ': ' . $message . PHP_EOL;
    }
}
