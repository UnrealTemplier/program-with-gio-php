<?php

namespace App;

use App\Traits\CappuccinoTrait;

class CappuccinoMaker extends CoffeeMaker
{
    use CappuccinoTrait {
        CappuccinoTrait::privateMethod as public;
    }
}