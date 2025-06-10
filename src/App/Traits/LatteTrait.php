<?php

namespace App\Traits;

trait LatteTrait
{
    public function makeLatte(): void
    {
        print_line(static::class . ' is making Latte with ' . $this->getMilkType());
    }

    public function getMilkType(): string
    {
        if (property_exists($this, 'milkType')) {
            return $this->milkType;
        }

        return 'whole-milk';
    }
}