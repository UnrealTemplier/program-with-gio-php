<?php

namespace App;

use App\Interfaces\LatteInterface;

class LatteMaker extends CoffeeMaker implements LatteInterface
{
    public function makeLatte(): void
    {
        print_line(static::class . ' is making Latte 1');
    }
}