<?php

namespace Gest\Telegest\models;

/**
 * Class representing a successful payment from the Telegram Bot API.
 *
 * @property string $currency Three-letter ISO 4217 currency code.
 * @property int $total_amount Total price in the smallest units of the currency (e.g., cents).
 * @property string $invoice_payload Bot specified invoice payload.
 * @property string $shipping_option_id Identifier of the shipping option chosen by the user.
 * @property OrderInfo|null $order_info Order info provided by the user.
 * @property string $telegram_payment_charge_id Telegram payment identifier.
 * @property string $provider_payment_charge_id Provider payment identifier.
 */
class SuccessfulPayment extends BaseModel {}
