<?php

namespace App;

use App\Traits\LatteTrait;

class LatteMaker extends CoffeeMaker
{
    use LatteTrait;

    public function makeLatte(): void
    {
        print_line(static::class . ' is making Latte (FINAL OVERRIDDEN!)');
    }
}