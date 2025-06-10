<?php

namespace App;

use App\Interfaces\CappuccinoInterface;
use App\Interfaces\LatteInterface;

class AllInOneCoffeeMaker extends CoffeeMaker implements LatteInterface, CappuccinoInterface
{
    // we can use interfaces to solve the Diamond Problem
    // it's a great way when implementations are different

    public function makeLatte(): void
    {
        print_line(static::class . ' is making Latte 2');
    }

    public function makeCappuccino(): void
    {
        print_line(static::class . ' is making Cappuccino 2');
    }
}