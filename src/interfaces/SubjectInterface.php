<?php

namespace Gest\Telegest\interfaces;

interface SubjectInterface
{
    public function attach(ObserverInterface $observer, string $event): void;

    public function detach(ObserverInterface $observer, string $event): void;

    public function notify(string $event, $data = null): void;
}