<?php

namespace Gest\Telegest\models;

/**
 * Class representing encrypted credentials required to decrypt the Telegram Passport data.
 *
 * @property string $data Base64-encoded encrypted JSON-serialized data with unique user's payload.
 * @property string $hash Base64-encoded data hash for data authentication.
 * @property string $secret Base64-encoded secret, encrypted with the bot's public RSA key.
 */
class EncryptedCredentials extends BaseModel{}
