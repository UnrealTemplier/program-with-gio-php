<?php

use App\CustomInvoice;
use App\Invoice;

require_once './../vendor/autoload.php';
require_once './../helpers.php';

print_line('different classes, same values');
$invoice1 = new Invoice(100, 'Invoice');
$invoice2 = new CustomInvoice(100, 'Invoice');

var_dump($invoice1);
print_line();
var_dump($invoice2);
print_line();

var_dump($invoice1 == $invoice2);
print_line();
var_dump($invoice1 === $invoice2);