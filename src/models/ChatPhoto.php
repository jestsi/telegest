<?php

namespace Gest\Telegest\models;

class ChatPhoto {
    private string $small_file_id;
    private string $big_file_id;

    public function __construct(array $data) {
        $this->small_file_id = $data['small_file_id'];
        $this->big_file_id = $data['big_file_id'];
    }

    public function __get($name) {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        throw new \Exception("Property {$name} does not exist");
    }
}