<?php

namespace Gest\Telegest\models;

/**
 * Class representing a venue from the Telegram Bot API.
 *
 * @property Location $location Venue location.
 * @property string $title Name of the venue.
 * @property string $address Address of the venue.
 * @property string|null $foursquare_id Foursquare identifier of the venue.
 * @property string|null $foursquare_type Foursquare type of the venue.
 */
class Venue extends BaseModel {}
