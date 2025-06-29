<?php

namespace App\Services\Shipping;

use InvalidArgumentException;

readonly class Weight
{
    public function __construct(public int $value)
    {
        if ($value <= 0 || $value > 150) {
            throw new InvalidArgumentException('Invalid weight');
        }
    }

    public function equals(int $weight): bool
    {
        return $this->value === $weight;
    }
}
