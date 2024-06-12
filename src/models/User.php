<?php

namespace Gest\Telegest\models;

/**
 * Class representing a user from the Telegram Bot API.
 *
 * @property int $id Unique identifier for this user or bot.
 * @property bool $is_bot True, if this user is a bot.
 * @property string $first_name User's or bot's first name.
 * @property string|null $last_name User's or bot's last name.
 * @property string|null $username User's or bot's username.
 * @property string|null $language_code IETF language tag of the user's language.
 */
class User extends BaseModel {
    /**
     * Constructor to initialize the user properties.
     *
     * @param array $data The data to initialize the user properties.
     */
    public function __construct(array $data_chat) {
        $this->properties['id'] = $data_chat['id'] ?? null;
        $this->properties['is_bot'] = $data_chat['is_bot'] ?? null;
        $this->properties['first_name'] = $data_chat['first_name'] ?? null;
        $this->properties['last_name'] = $data_chat['last_name'] ?? null;
        $this->properties['username'] = $data_chat['username'] ?? null;
        $this->properties['language_code'] = $data_chat['language_code'] ?? null;
    }
}
