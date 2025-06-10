<?php

namespace App\Traits;

trait LatteTrait
{
    // trait's static properties are NOT SHARED between objects using this trait
    // every such property is individual and isolated
    public static int $x = 1;

    public function makeLatte(): void
    {
        print_line(static::class . ' is making Latte');
    }

    public static function foo(): void
    {
        print_line(static::$x);
    }
}