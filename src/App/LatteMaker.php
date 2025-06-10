<?php

namespace App;

use App\Traits\LatteTrait;

class LatteMaker extends CoffeeMaker
{
    use LatteTrait;

    public function getMilkType(): string
    {
        return 'skim-milk';
    }
}