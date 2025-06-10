<?php

namespace App;

class ClassA
{
    public static function make(): static
    {
        return new static();
    }
}