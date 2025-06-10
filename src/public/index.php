<?php

declare(strict_types=1);

require_once './../vendor/autoload.php';
require_once './../helpers.php';

$invoice = new App\Invoice();

print_line('Is object callable: ' . (is_callable($invoice) ? 'true' : 'false'));
$invoice();

