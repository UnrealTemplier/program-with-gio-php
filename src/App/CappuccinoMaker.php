<?php

namespace App;

use App\Interfaces\CappuccinoInterface;

class CappuccinoMaker extends CoffeeMaker implements CappuccinoInterface
{
    public function makeCappuccino(): void
    {
        print_line(static::class . ' is making Cappuccino 1');
    }
}