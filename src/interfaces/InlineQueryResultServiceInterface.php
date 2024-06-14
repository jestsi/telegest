<?php

namespace Gest\Telegest\interfaces;

interface InlineQueryResultServiceInterface
{
    public function createResult(string $type, string $id, array $params = []): array;
}