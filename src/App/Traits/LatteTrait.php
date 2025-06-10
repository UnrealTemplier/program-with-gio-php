<?php

namespace App\Traits;

trait LatteTrait
{
    public function makeLatte(): void
    {
        print_line(static::class . ' is making Latte');
    }

    public function makeCoffee(): void
    {
        print_line(static::class . ' is making coffee (overridden in trait)');
    }
}