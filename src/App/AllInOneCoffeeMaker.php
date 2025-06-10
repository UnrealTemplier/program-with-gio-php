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

    // we can redefine trait's property only if it's completely the same
    public string $milkType = 'whole-milk';
}