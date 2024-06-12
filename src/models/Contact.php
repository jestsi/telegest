<?php

namespace Gest\Telegest\models;

/**
 * Class representing a contact from the Telegram Bot API.
 *
 * @property string $phone_number Contact's phone number.
 * @property string $first_name Contact's first name.
 * @property string|null $last_name Contact's last name.
 * @property int|null $user_id Contact's user identifier in Telegram.
 * @property string|null $vcard Additional data about the contact in the form of a vCard.
 */
class Contact extends BaseModel {}