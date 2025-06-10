<?php

declare(strict_types=1);

require_once './../vendor/autoload.php';
require_once './../helpers.php';

print_line(new \App\ClassA()::getName());
print_line(new \App\ClassB()::getName());

