<?php

namespace App;

class LatteMaker extends CoffeeMaker
{
    public function makeLatte(): void
    {
        print_line(static::class . ' is making Latte');
    }
}