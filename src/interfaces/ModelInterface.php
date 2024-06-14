<?php

namespace Gest\Telegest\interfaces;

use Gest\Telegest\types\UpdateType;

interface ModelInterface
{
    public function getType() : UpdateType;
}