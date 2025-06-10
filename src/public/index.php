<?php

declare(strict_types=1);

use App\ClassA;

require_once './../vendor/autoload.php';
require_once './../helpers.php';

$a = new ClassA(2, 5);
var_dump($a);

print_line();

$a->foo();
print_line();

$obj = $a->bar();
var_dump($obj);
print_line();
$obj->baz();