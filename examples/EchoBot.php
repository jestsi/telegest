<?php
require './../vendor/autoload.php';

use Gest\Telegest\Config;
use Gest\Telegest\TGBot;
use Gest\Telegest\loggers\SimpleLogger;
use Gest\Telegest\models\Message;
use Gest\Telegest\TGBotClient;
use Gest\Telegest\types\UpdateType;

$token = '7061835054:AAG0rPIZgPzCmr1rSjxbILfSmwA1Nos8oos';

$config = Config::getInstance();
$config->set('token', $token);
$config->setLogger(new SimpleLogger);

$bot = new TGBot();
$bot
    ->getUpdateHandler()
    ->attachCallable(UpdateType::ALL, function($message) {
        $message = new Message($message);
        (new TGBotClient)->simpleSendMessage($message->chat->user->id, $message->text);
    });
    
$bot->getUpdateHandler()->handleUpdates()->run();