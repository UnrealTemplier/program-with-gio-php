<?php

namespace App;

use App\Traits\CappuccinoTrait;
use App\Traits\LatteTrait;

class AllInOneCoffeeMaker extends CoffeeMaker
{
    // we can use traits to solve the Diamond Problem
    // it's a great way when implementations are the same

    use LatteTrait;
    use CappuccinoTrait;

    public function makeCoffee(): void
    {
        print_line(static::class .
            ' is making coffee (overridden in child class on top of overridden in trait)');
    }

    public function makeCappuccino(): void
    {
        print_line(static::class . ' is making Cappuccino (overridden in class on top of trait)');
    }
}