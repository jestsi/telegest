<?php

namespace Gest\Telegest\models;

/**
 * Class representing passport data shared by a user from the Telegram Bot API.
 *
 * @property array $data Array with information about documents and other Telegram Passport elements that was shared with the bot.
 * @property EncryptedCredentials $credentials Encrypted credentials required to decrypt the data.
 */
class PassportData extends BaseModel {}
