<?php

namespace Gest\Telegest\models;

abstract class BaseModel 
{
    protected array $properties = [];

    /**
     * Constructor to initialize the animation properties.
     *
     * @param array $data The data to initialize the animation properties.
     */
    public function __construct(array $data) {
        $this->properties = $data;
    }

    /**
     * Magic method to get the value of a property.
     *
     * @param string $name The name of the property.
     * @return mixed The value of the property.
     * @throws \Exception if the property does not exist.
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }
        throw new \Exception("Property {$name} does not exist");
    }

    /**
     * Magic method to set the value of a property.
     *
     * @param string $name The name of the property.
     * @param mixed $value The value to set.
     * @throws \Exception if the property does not exist.
     */
    public function __set($name, $value) {
        $this->properties[$name] = $value;
    }

    /**
     * Magic method to check if a property is set.
     *
     * @param string $name The name of the property.
     * @return bool True if the property is set, false otherwise.
     */
    public function __isset($name) {
        return isset($this->properties[$name]);
    }

    /**
     * Magic method to unset a property.
     *
     * @param string $name The name of the property.
     */
    public function __unset($name) {
        unset($this->properties[$name]);
    }
}