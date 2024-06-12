<?php

namespace Gest\Telegest\interfaces;

interface RequestInterface 
{
    public function send($method, $params = []);
}