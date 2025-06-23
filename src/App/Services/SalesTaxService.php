<?php

namespace App\Services;

class SalesTaxService
{
    public function calculate(float $amount, array $customer): float
    {
        return $amount * 0.65 / 100;
    }
}