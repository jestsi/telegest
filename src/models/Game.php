<?php

namespace Gest\Telegest\models;

/**
 * Class representing a game from the Telegram Bot API.
 *
 * @property string $title Title of the game.
 * @property string $description Description of the game.
 * @property array $photo Photo that will be displayed in the game message in chats.
 * @property string|null $text Brief description of the game or high scores included in the game message.
 * @property array|null $text_entities Special entities that appear in text, such as usernames, URLs, bot commands, etc.
 * @property Animation|null $animation Animation that will be displayed in the game message in chats.
 */
class Game extends BaseModel {}
