<?php

namespace Gest\Telegest\models;

/**
 * Class representing a location from the Telegram Bot API.
 *
 * @property float $latitude Latitude as defined by sender.
 * @property float $longitude Longitude as defined by sender.
 * @property float|null $horizontal_accuracy The radius of uncertainty for the location, measured in meters; 0-1500.
 * @property int|null $live_period Time relative to the message sending date, during which the location can be updated, in seconds. For active live locations only.
 * @property int|null $heading The direction in which user is moving, in degrees; 1-360. For live locations only.
 * @property int|null $proximity_alert_radius Maximum distance for proximity alerts about approaching another chat member, in meters. For sent live locations only.
 */
class Location extends BaseModel {}