<?php

namespace Gest\Telegest\interfaces;

use Gest\Telegest\types\UpdateType;

interface ModelInteface
{
    public function getType() : UpdateType;
}