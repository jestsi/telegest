<?php

namespace Gest\Telegest;

use Gest\Telegest\builders\InlineQueryAnswerBuilder;
use Gest\Telegest\core\Request;
use Gest\Telegest\models\Message;
use Gest\Telegest\types\TelegramMethods;

class TGBotClient
{
    function __construct(string $token = null)
    {
        if ($token)
            Container::getContainer()->set('token', $token);
    }
    public function simpleSendMessage($chatId, string $text)
    {
        return Request::getInstance()->send(TelegramMethods::SEND_MESSAGE->value, [
            'chat_id' => $chatId,
            'text' => $text,
        ]);
    }

    public function sendMessage(Message $message)
    {
        return Request::getInstance()->send(TelegramMethods::SEND_MESSAGE->value, [
            'chat_id' => $message->chat->user->id,
            'text' => $message->text,
        ]);
    }

    public function sendAnswerInlineQuery(InlineQueryAnswerBuilder $inlineQueryAnswerBuilder)
    {
        return Request::getInstance()->send(TelegramMethods::ANSWER_INLINE_QUERY->value, $inlineQueryAnswerBuilder->build());
    }

    public function deleteMessageById(int $id, int $chatId)
    {
        return Request::getInstance()->send(TelegramMethods::DELETE_MESSAGE->value, ['message_id' => $id, 'chat_id' => $chatId]);
    }

    public function deleteMessage(Message $message)
    {
        return Request::getInstance()->send(TelegramMethods::DELETE_MESSAGE->value, ['message_id' => $message->id, 'chat_id' => $message->chat->user->id]);
    }
}