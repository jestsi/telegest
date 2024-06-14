<?php

namespace Gest\Telegest\interfaces;

interface SubjectInterface
{
    public function attach(ObserverInterface $observer, string $event);

    public function detach(ObserverInterface $observer, string $event);

    public function notify(string $event, $data = null): void;
}