<?php
require './../vendor/autoload.php';

use Gest\Telegest\Config;
use Gest\Telegest\TGBot;
use Gest\Telegest\loggers\SimpleLogger;
use Gest\Telegest\models\Message;
use Gest\Telegest\TGBotClient;
use Gest\Telegest\types\UpdateType;

$token = '7061835054:AAG0rPIZgPzCmr1rSjxbILfSmwA1Nos8oos';

$bot = new TGBot($token);

$updateHandler = $bot->getUpdateHandler();
$updateHandler->attachCallable(UpdateType::Message, 
    function($message) {
        (new TGBotClient)->sendMessage($message);
    });
    
$updateHandler->handleUpdates()->run();