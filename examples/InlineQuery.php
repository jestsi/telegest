<?php

use Gest\Telegest\Config;
use Gest\Telegest\builders\InlineQueryAnswerBuilder;
use Gest\Telegest\loggers\SimpleLogger;
use Gest\Telegest\models\InlineQuery;
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
    ->attachCallable(UpdateType::InlineQuery, function ($query) use ($bot) {
        $query = new InlineQuery($query);
        $builder = (new InlineQueryAnswerBuilder($query->id))
            ->addArticleResult('1', 'test', '/delete')
            ->addPhotoResult('2', 
                'https://w7.pngwing.com/pngs/140/284/png-transparent-animated-woody-illustation-buzz-lightyear-sheriff-woody-jessie-toy-story-film-toy-story-cartoon-pixar-toy-story-3.png', 
                'https://www.pinclipart.com/picdir/big/209-2099521_thumb-up-comments-english-lovers-clipart.png')
            ->addLocationResult('3', 48.90174, 2.27829, 'Париж');
        (new TGBotClient)->sendAnswerInlineQuery($builder);
    });
    
$bot->getUpdateHandler()->handleUpdates()->run();