<?php

use App\Invoice;

require_once './../vendor/autoload.php';
require_once './../helpers.php';

print_line('circular dependency!');
$invoice1 = new Invoice(100, 'Invoice');
$invoice2 = new Invoice(100, 'Invoice');

$invoice1->linkedInvoice = $invoice2;
$invoice2->linkedInvoice = $invoice1;

var_dump($invoice1);
print_line();
var_dump($invoice2);
print_line();

var_dump($invoice1 == $invoice2);
print_line();
var_dump($invoice1 === $invoice2);