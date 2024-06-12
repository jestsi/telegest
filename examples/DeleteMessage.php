<?php

use Gest\Telegest\builders\InlineQueryAnswerBuilder;
use Gest\Telegest\Config;
use Gest\Telegest\loggers\SimpleLogger;
use Gest\Telegest\models\InlineQuery;
use Gest\Telegest\models\Message;
use Gest\Telegest\TGBot;
use Gest\Telegest\TGBotClient;
use Gest\Telegest\types\UpdateType;

include_once './../vendor/autoload.php';

$token = '7061835054:AAG0rPIZgPzCmr1rSjxbILfSmwA1Nos8oos';

$config = Config::getInstance();
$config->set('token', $token);
$config->setLogger(new SimpleLogger);
$bot = new TGBot();
$bot
    ->getUpdateHandler()
    ->attachCallable(UpdateType::Message,
        function ($message) {
            $message = new Message($message);
            (new TGBotClient())->deleteMessage($message);
        }
    );
    
$bot->getUpdateHandler()->handleUpdates()->run();