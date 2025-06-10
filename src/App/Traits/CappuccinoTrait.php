<?php

namespace App\Traits;

trait CappuccinoTrait
{
    use LatteTrait;

    public function makeCappuccino(): void
    {
        print_line(static::class . ' is making Cappuccino');
    }
}