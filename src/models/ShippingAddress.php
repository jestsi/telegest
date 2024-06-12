<?php

namespace Gest\Telegest\models;

/**
 * Class representing a shipping address provided by the user.
 *
 * @property string $country_code ISO 3166-1 alpha-2 country code.
 * @property string $state State, if applicable.
 * @property string $city City.
 * @property string $street_line1 First line for the address.
 * @property string $street_line2 Second line for the address.
 * @property string $post_code Address post code.
 */
class ShippingAddress extends BaseModel {}