<?php

declare(strict_types=1);

require_once './../vendor/autoload.php';
require_once './../helpers.php';

$a = \App\ClassA::make();
$b = \App\ClassB::make();

print_line($a::class);
print_line($b::class);