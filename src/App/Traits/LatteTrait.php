<?php

namespace App\Traits;

trait LatteTrait
{
    public function makeLatte(): void
    {
        print_line(static::class . ' is making Latte (Latte Trait)');
    }
}