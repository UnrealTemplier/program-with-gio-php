<?php

use App\Customer;
use App\Invoice;

require_once './../vendor/autoload.php';
require_once './../helpers.php';

print_line('different objects, same values, nested objects also have the same values');
$invoice1 = new Invoice(new Customer('1'), 100, 'Invoice');
$invoice2 = new Invoice(new Customer('1'), 100, 'Invoice');

var_dump($invoice1);
print_line();
var_dump($invoice2);
print_line();

var_dump($invoice1 == $invoice2);
print_line();
var_dump($invoice1 === $invoice2);

print_line();
print_line();

// ----------------------------------

print_line('different objects, same values, nested objects have different values');
$invoice1 = new Invoice(new Customer('1'), 100, 'Invoice');
$invoice2 = new Invoice(new Customer('2'), 100, 'Invoice');

var_dump($invoice1);
print_line();
var_dump($invoice2);
print_line();

var_dump($invoice1 == $invoice2);
print_line();
var_dump($invoice1 === $invoice2);