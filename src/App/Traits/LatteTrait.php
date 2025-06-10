<?php

namespace App\Traits;

trait LatteTrait
{
    public string $milkType = 'whole-milk';

    public function makeLatte(): void
    {
        print_line(static::class . ' is making Latte with ' . $this->milkType);
    }
}