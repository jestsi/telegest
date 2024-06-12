<?php

namespace Gest\Telegest\models;

class InlineQuery extends BaseModel
{
    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->from = new User($data);
    }
}
