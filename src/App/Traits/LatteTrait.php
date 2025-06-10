<?php

namespace App\Traits;

trait LatteTrait
{
    final public function makeLatte(): void
    {
        print_line(static::class . ' is making Latte');
    }
}