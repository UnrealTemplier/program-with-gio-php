<?php

declare(strict_types=1);

use App\{AllInOneCoffeeMaker, CappuccinoMaker, CoffeeMaker, LatteMaker};

require_once './../vendor/autoload.php';
require_once './../helpers.php';

$coffeeMaker = new CoffeeMaker();
$coffeeMaker->makeCoffee();

print_line();

$latteMaker = new LatteMaker();
$latteMaker->makeCoffee();
$latteMaker->makeLatte();
$latteMaker::$x = 2;
$latteMaker::foo();

print_line();

$cappuccinoMaker = new CappuccinoMaker();
$cappuccinoMaker->makeCoffee();
$cappuccinoMaker->makeCappuccino();

print_line();

$allInOneCoffeeMaker = new AllInOneCoffeeMaker();
$allInOneCoffeeMaker->makeCoffee();
$allInOneCoffeeMaker->makeLatte();
$allInOneCoffeeMaker->makeCappuccino();
$allInOneCoffeeMaker::$x = 3;
$allInOneCoffeeMaker::foo();