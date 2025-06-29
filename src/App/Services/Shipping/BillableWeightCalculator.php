<?php

namespace App\Services\Shipping;

readonly class BillableWeightCalculator
{
    public function calculate(
        PackageDimensions $dimensions,
        Weight $weight,
        DimDivisor $dimDivisor,
    ): int {
        $dimWeight = (int)round(
            $dimensions->width * $dimensions->height * $dimensions->length
            / $dimDivisor->value,
        );

        return max($dimWeight, $weight->value);
    }
}
