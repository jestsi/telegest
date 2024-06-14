<?php

namespace Gest\Telegest;

use DI\ContainerBuilder;

class Container
{
    private static $container;

    public static function getContainer()
    {
        if (self::$container === null) {
            $builder = new ContainerBuilder();
            
            $config = require_once __DIR__ . '/configs/ContainerConfig.php';
            $config($builder);
            
            self::$container = $builder->build();
        }

        return self::$container;
    }
}