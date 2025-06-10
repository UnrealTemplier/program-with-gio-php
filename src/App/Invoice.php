<?php

namespace App;

class Invoice
{
    public function __toString(): string
    {
        return 'This is a text description of an object of class ' . self::class;
    }
}