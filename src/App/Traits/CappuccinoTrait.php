<?php

namespace App\Traits;

trait CappuccinoTrait
{
    public function makeCappuccino(): void
    {
        print_line(static::class . ' is making Cappuccino');
    }
}