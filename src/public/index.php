<?php

declare(strict_types=1);

require_once './../vendor/autoload.php';
require_once './../helpers.php';

$invoice = new App\Invoice();

$invoice->process(1, 2, 3);

print_line();

$invoice::processStatic('Hello', 4, 5, 6);
