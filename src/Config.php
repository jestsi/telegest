<?php

namespace Gest\Telegest;

use DI\ContainerBuilder;
use Gest\Telegest\builders\UpdateModelMapBuilder;
use Gest\Telegest\core\AsyncTaskRunner;
use Gest\Telegest\core\Request;
use Gest\Telegest\core\TaskRunner;
use Gest\Telegest\factory\UpdateModelFactory;
use Gest\Telegest\interfaces\BotRunnerInterface;
use Gest\Telegest\interfaces\LoggerInterface;
use Gest\Telegest\interfaces\RequestInterface;
use Gest\Telegest\loggers\SimpleLogger;
use Gest\Telegest\models\InlineQuery;
use Gest\Telegest\models\Message;
use Gest\Telegest\types\LogLevel;
use Gest\Telegest\types\UpdateType;
use Psr\Container\ContainerInterface;

class Config {
    private static $instance = null;
    private static $container = null;
    private $settings = [];
    private $logger;

    // Закрытый конструктор для предотвращения создания новых экземпляров
    private function __construct() { }

    private static function initializeContainer() {
        $containerBuilder = new ContainerBuilder();

        $containerBuilder->addDefinitions([
            LoggerInterface::class => \DI\create(SimpleLogger::class),
            BotRunnerInterface::class => fn(ContainerInterface $c) => AsyncTaskRunner::getInstance(),
            Config::class => function(ContainerInterface $c) {
                $config = Config::getInstance();
                $config->setLogger($c->get(LoggerInterface::class));
                return $config;
            },
            UpdateHandler::class => function(ContainerInterface $c)
            {
                $builder = new UpdateModelMapBuilder();
        
                $builder->addMapping(UpdateType::Message, Message::class);
                $builder->addMapping(UpdateType::InlineQuery, InlineQuery::class);
                
                $updateModelFactory = new UpdateModelFactory($builder);
                return new UpdateHandler($c->get(BotRunnerInterface::class), $updateModelFactory);
            },
            RequestInterface::class => function(ContainerInterface $c) {
                $config = Config::getInstance();
                return new Request($config->get('token'));
            }
        ]);

        self::$container = $containerBuilder->build();
    }

    public static function getContainer(): ContainerInterface {
        self::getInstance();
        return self::$container;
    }

    // Метод для получения единственного экземпляра класса
    public static function getInstance() : self 
    {
        if (self::$instance === null) {
            self::$instance = new Config();
            self::initializeContainer();
        }
        return self::$instance;
    }

    // Метод для установки настройки
    public function set($key, $value) {
        $this->settings[$key] = $value;
        if (!$this->logger) return;
        $this->getLogger()->log(LogLevel::INFO, "Setting [$key] has been set to [$value]");
    }

    // Метод для получения настройки
    public function get($key) {
        return isset($this->settings[$key]) ? $this->settings[$key] : null;
    }

    public function setLogger(LoggerInterface $logger) {
        $this->logger = $logger;
    }

    public function getLogger()
    {
        return $this->logger;
    }

    // Метод для предотвращения клонирования экземпляра
    private function __clone() { }

    // Метод для предотвращения десериализации экземпляра
    public function __wakeup() { }
}