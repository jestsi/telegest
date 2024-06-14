<?php

require './../vendor/autoload.php';

use Gest\Telegest\Config;
use Gest\Telegest\TGBot;
use Gest\Telegest\TGBotClient;

$token = '7061835054:AAG0rPIZgPzCmr1rSjxbILfSmwA1Nos8oos';

$config = Config::getInstance();
$config->set('token', $token);

$bot = new TGBot();
$bot
    ->getUpdateHandler()
    ->registerCommand('/start', 
        fn($message, $params) => (new TGBotClient)->simpleSendMessage($message->chat->user->id, $params[0])
    );


$bot->getUpdateHandler()->handleUpdates()->run();