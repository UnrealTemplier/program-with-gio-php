<?php

declare(strict_types=1);

use App\Invoice;
use App\InvoiceCollection;

require_once './../vendor/autoload.php';
require_once './../helpers.php';

$invoiceCollection = new InvoiceCollection([
    new Invoice(25),
    new Invoice(45),
    new Invoice(67)
]);

foreach ($invoiceCollection as $invoice) {
    print_line($invoice->id . ' => ' . $invoice->amount);
}
