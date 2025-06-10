<?php

declare(strict_types=1);

use App\Traits\SomeTrait;

require_once './../vendor/autoload.php';
require_once './../helpers.php';

$obj = new class(1, 2, 3) extends \Reflection {
    use SomeTrait;

    public function __construct(public int $x, public int $y, public int $z) {}

    public function foo(): void
    {
        print_line('FOO');
    }
};

var_dump($obj);

print_line();

$obj->foo();

print_line();

print_line('Anonymous class name: ' . get_class($obj));