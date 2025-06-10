<?php

use App\Invoice;

require_once './../vendor/autoload.php';
require_once './../helpers.php';

print_line('different objects, different values');
$invoice1 = new Invoice(25, 'Invoice 1');
$invoice2 = new Invoice(50, 'Invoice 2');

var_dump($invoice1);
print_line();
var_dump($invoice2);
print_line();

var_dump($invoice1 == $invoice2);
print_line();
var_dump($invoice1 === $invoice2);

print_line();
print_line();

// -------------------------------------

print_line('different objects, same values');
$invoice1 = new Invoice(100, 'Invoice');
$invoice2 = new Invoice(100, 'Invoice');

var_dump($invoice1);
print_line();
var_dump($invoice2);
print_line();

var_dump($invoice1 == $invoice2);
print_line();
var_dump($invoice1 === $invoice2);

print_line();
print_line();

// -------------------------------------

print_line('different objects, different values, but (1 == true) if compared loose');
$invoice1 = new Invoice(1, 'Invoice');
$invoice2 = new Invoice(true, 'Invoice');

var_dump($invoice1);
print_line();
var_dump($invoice2);
print_line();

var_dump($invoice1 == $invoice2);
print_line();
var_dump($invoice1 === $invoice2);

print_line();
print_line();

// -------------------------------------

print_line('same objects, different references');
$invoice1 = new Invoice(100, 'Invoice');
$invoice2 = $invoice1;

var_dump($invoice1);
print_line();
var_dump($invoice2);
print_line();

var_dump($invoice1 == $invoice2);
print_line();
var_dump($invoice1 === $invoice2);

print_line();
print_line();