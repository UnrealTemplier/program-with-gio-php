<?php

namespace App\Traits;

trait LatteTrait
{
    public function makeLatte(): void
    {
        print_line(static::class . ' is making Latte with ' . $this->getMilkType());
    }

    abstract public function getMilkType(): string;
}