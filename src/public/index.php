<?php

declare(strict_types=1);

require_once './../vendor/autoload.php';
require_once './../helpers.php';

$invoice = new App\Invoice();

print_line($invoice);

print_line();

print_line('Is object instance of Stringable: ' .
    (($invoice instanceof Stringable) ? 'true' : 'false'));
