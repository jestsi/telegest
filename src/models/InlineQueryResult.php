<?php

namespace Gest\Telegest\models;

class InlineQueryResult
{
    private $type;
    private $id;
    private $params;

    public function __construct(string $type, string $id, array $params = [])
    {
        $this->type = $type;
        $this->id = $id;
        $this->params = $params;
    }

    public function toArray(): array
    {
        return array_merge(['type' => $this->type, 'id' => $this->id], $this->params);
    }
}