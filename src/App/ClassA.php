<?php

namespace App;

class ClassA
{
    public static string $name = 'A';

    public static function getName(): string
    {
        return self::$name;
    }
}