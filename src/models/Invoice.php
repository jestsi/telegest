<?php

namespace Gest\Telegest\models;

/**
 * Class representing an invoice from the Telegram Bot API.
 *
 * @property string $title Product name.
 * @property string $description Product description.
 * @property string $start_parameter Unique bot deep-linking parameter.
 * @property string $currency Three-letter ISO 4217 currency code.
 * @property int $total_price Total price in the smallest units of the currency (e.g., cents).
 */
class Invoice extends BaseModel {}