<?php

namespace Gest\Telegest\interfaces;

interface ObserverInterface
{
    public function update(SubjectInterface $subject, $data);
}