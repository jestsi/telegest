<?php

namespace Gest\Telegest\models;

/**
 * Class representing an animation file from the Telegram Bot API.
 *
 * @property string $file_id Unique identifier for this file.
 * @property string|null $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
 * @property int $width Width of the animation.
 * @property int $height Height of the animation.
 * @property int $duration Duration of the animation in seconds.
 * @property string|null $mime_type MIME type of the animation.
 * @property int|null $file_size File size.
 */
class Animation extends BaseModel {}
