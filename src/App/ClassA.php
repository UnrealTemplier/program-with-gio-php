<?php

namespace App;

class ClassA
{
    public function __construct(public int $x, public int $y) {}

    public function foo(): void
    {
        echo 'FOO' . PHP_EOL;
    }

    public function bar(): object
    {
        return new class($this->x, $this->y) {
            public function __construct(public int $a, public int $b) {}

            public function baz(): void
            {
                echo $this->a . PHP_EOL;
                echo $this->b . PHP_EOL;
            }
        };
    }
}