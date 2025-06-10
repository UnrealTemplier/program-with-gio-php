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
        return new class($this->x, $this->y) extends ClassA {
            public function __construct(int $a, int $b)
            {
                parent::__construct($a, $b);
            }

            public function baz(): void
            {
                echo $this->x . PHP_EOL;
                echo $this->y . PHP_EOL;
                print_line();
                $this->foo();
            }
        };
    }
}