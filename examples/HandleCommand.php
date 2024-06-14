<?php

require './../vendor/autoload.php';

use Gest\Telegest\Config;
use Gest\Telegest\models\Command;
use Gest\Telegest\models\Message;
use Gest\Telegest\TGBot;
use Gest\Telegest\TGBotClient;

$token = '7061835054:AAG0rPIZgPzCmr1rSjxbILfSmwA1Nos8oos';

$bot = new TGBot($token);
$bot
    ->getUpdateHandler()
    ->registerCommand('/start', 
        fn(Message $message, Command $command) => 
            (new TGBotClient)
                ->simpleSendMessage(
                    $message->chat->user->id, 
                    $command->getParams()[0] ?? $message->text)
    );


$bot->getUpdateHandler()->handleUpdates()->run();