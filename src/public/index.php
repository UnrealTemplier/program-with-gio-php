<?php

declare(strict_types=1);

require_once './../vendor/autoload.php';
require_once './../helpers.php';

$invoice = new App\Invoice();
var_dump($invoice);
print_line();

$invoice->amount = 14;

print_line($invoice->amount);
