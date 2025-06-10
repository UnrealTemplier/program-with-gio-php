<?php

namespace App;

class CappuccinoMaker extends CoffeeMaker
{
    public function makeCappuccino(): void
    {
        print_line(static::class . ' is making Cappuccino');
    }
}