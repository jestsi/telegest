<?php

namespace Gest\Telegest\configs;

use DI\ContainerBuilder;
use Gest\Telegest\builders\UpdateModelMapBuilder;
use Gest\Telegest\core\AsyncTaskRunner;
use Gest\Telegest\core\Request;
use Gest\Telegest\factory\UpdateModelFactory;
use Gest\Telegest\interfaces\BotRunnerInterface;
use Gest\Telegest\interfaces\InlineQueryResultServiceInterface;
use Gest\Telegest\interfaces\LoggerInterface;
use Gest\Telegest\interfaces\RequestInterface;
use Gest\Telegest\loggers\SimpleLogger;
use Gest\Telegest\models\InlineQuery;
use Gest\Telegest\models\Message;
use Gest\Telegest\services\CommandService;
use Gest\Telegest\services\InlineQueryResultService;
use Gest\Telegest\types\UpdateType;
use Gest\Telegest\UpdateHandler;
use Psr\Container\ContainerInterface;

return function (ContainerBuilder $builder) {
    $builder->addDefinitions([
        LoggerInterface::class => \DI\create(SimpleLogger::class),
        BotRunnerInterface::class => fn(ContainerInterface $c) => AsyncTaskRunner::getInstance(),
        UpdateHandler::class => function(ContainerInterface $c)
        {
            $builder = new UpdateModelMapBuilder();
    
            $builder->addMapping(UpdateType::Message, Message::class);
            $builder->addMapping(UpdateType::InlineQuery, InlineQuery::class);
            
            $updateModelFactory = new UpdateModelFactory($builder);
            return new UpdateHandler($c->get(BotRunnerInterface::class), $updateModelFactory);
        },
        RequestInterface::class => function(ContainerInterface $c) {
            return new Request($c->get('token'));
        },
        CommandService::class => \DI\create(CommandService::class),
        InlineQueryResultServiceInterface::class => \DI\create(InlineQueryResultService::class),
    ]);
};