<?php

namespace Gest\Telegest\models;

/**
 * Class representing a dice from the Telegram Bot API.
 *
 * @property string $emoji Emoji on which the dice throw animation is based.
 * @property int $value Value of the dice, 1-6 for regular dice, 1-5 for darts and basketball.
 */
class Dice extends BaseModel {}
