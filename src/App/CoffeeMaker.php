<?php

namespace App;

class CoffeeMaker
{
    public function makeCoffee(): void
    {
        print_line(static::class . ' is making coffee');
    }
}