<?php

namespace Gest\Telegest\models;

/**
 * Class representing a poll from the Telegram Bot API.
 *
 * @property string $id Unique poll identifier.
 * @property string $question Poll question, 1-300 characters.
 * @property array $options List of poll options.
 * @property bool $is_closed True, if the poll is closed.
 */
class Poll extends BaseModel {}
