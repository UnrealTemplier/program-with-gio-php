<?php

namespace App;

class Invoice
{
    // experiment with public/protected/private
    // experiment with commenting this property out
    protected int $amount = 36;

    // __get magic method is called when object
    // doesn't exist or inaccessible
    // using this we can break encapsulation
    public function __get(string $name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        return 'Property ' . $name . ' does not exist';
    }

    // __set magic method is called when object
    // doesn't exist or inaccessible
    // using this we can break encapsulation
    public function __set(string $name, $value): void
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }
}