<?php

use App\Invoice;

require_once './../vendor/autoload.php';
require_once './../helpers.php';

$invoice = new Invoice(25, 'my invoice', '123456789');
print_line('Original:');
d($invoice);

$clonedInvoice = clone $invoice;
print_line('Cloned:');
d($clonedInvoice);

$serObj = serialize($invoice);
print_line('Serialized:');
d($serObj);

$invoice2 = unserialize($serObj);
print_line('Unserialized:');
d($invoice2);