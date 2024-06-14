<?php

namespace Gest\Telegest\services;

use Gest\Telegest\interfaces\InlineQueryResultServiceInterface;

class InlineQueryResultService implements InlineQueryResultServiceInterface
{
    public function createResult(string $type, string $id, array $params = []): array
    {
        return array_merge(['type' => $type, 'id' => $id], $params);
    }
}