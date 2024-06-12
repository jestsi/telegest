<?php

use Gest\Telegest\Config;
use Gest\Telegest\models\InlineQuery;
use Gest\Telegest\TGBot;
use PHPUnit\Framework\TestCase;

final class TGBotTest extends TestCase
{
    protected $configMock;

    public function setUp() : void
    {
        $token = '7061835054:AAG0rPIZgPzCmr1rSjxbILfSmwA1Nos8oos';
        parent::setUp();
        // Создание макета (mock) для класса Config
        $this->configMock = Config::getInstance();
        $this->configMock->set('token', $token);
    }

    public function testCanBeInstantiated()
    {
        $bot = new TGBot();
        return $this->assertInstanceOf(TGBot::class, $bot);
    }

   public function testGetUpdateHandler()
    {
        // Замещение для AsyncTaskRunner
        $asyncTaskRunnerMock = $this->getMockBuilder('Gest\Telegest\core\AsyncTaskRunner')
                                     ->getMock();
        
        // Создание экземпляра TGBot с макетом для Config
        $tgBot = new TGBot($this->configMock);

        // Проверка, что при вызове метода getUpdateHandler()
        // будет возвращен объект UpdateHandler
        $this->assertInstanceOf('Gest\Telegest\UpdateHandler', $tgBot->getUpdateHandler());
    }
}
