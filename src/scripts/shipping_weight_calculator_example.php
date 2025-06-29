<?php

declare(strict_types=1);

use App\App;
use App\Services\Shipping\BillableWeightCalculator;
use App\Services\Shipping\DimDivisor;
use App\Services\Shipping\PackageDimensions;
use App\Services\Shipping\Weight;

/** @var App $app */
$app = require_once __DIR__ . '/boostrap_cli.php';
$app->boot();

$packageParams = [
    'weight' => 9,
    'dimensions' => [
        'width' => 14,
        'height' => 8,
        'length' => 12,
    ],
];

$packageDimensions = new PackageDimensions(
    $packageParams['dimensions']['width'],
    $packageParams['dimensions']['height'],
    $packageParams['dimensions']['length'],
);

$otherDimensions = $packageDimensions->increaseWidth(10);

$weight = new Weight($packageParams['weight']);
$otherWeight = new Weight(19);

$billableWeightCalculator = new BillableWeightCalculator();

$billableWeight = $billableWeightCalculator->calculate(
    $packageDimensions,
    $weight,
    DimDivisor::FEDEX,
);

$otherBillableWeight = $billableWeightCalculator->calculate(
    $otherDimensions,
    $otherWeight,
    DimDivisor::FEDEX,
);

print_line($billableWeight);
print_line($otherBillableWeight);


