<?php

declare(strict_types=1);

use App\Enums\InvoiceStatus;
use App\Models\Invoice;
use App\Models\InvoiceItem;

require_once __DIR__ . '/../eloquent.php';

//Capsule::connection()->transaction(function () {
//    $invoice = new Invoice();
//    $invoice->amount = 57;
//    $invoice->invoice_number = '1';
//    $invoice->status = InvoiceStatus::Pending;
//    $invoice->due_date = new Carbon()->addDays(10);
//    $invoice->save();
//
//    $items = [['Item 1', 10, 4.55], ['Item 2', 20, 6.39], ['Item 3', 30, 7.89]];
//
//    foreach ($items as [$description, $quantity, $unitPrice]) {
//        $invoiceItem = new InvoiceItem();
//        $invoiceItem->description = $description;
//        $invoiceItem->quantity = $quantity;
//        $invoiceItem->unit_price = $unitPrice;
//
//        $invoiceItem->invoice()->associate($invoice);
//
//        $invoiceItem->save();
//    }
//});

//$invoiceIds = [2, 3];
//
//foreach ($invoiceIds as $invoiceId) {
//    Invoice::query()
//        ->where('id', $invoiceId)
//        ->update(['status' => InvoiceStatus::Paid]);
//}

Invoice::query()
    ->where('status', InvoiceStatus::Paid)
    ->get()->each(function (Invoice $invoice) {
        echo $invoice->id
            . ', ' . $invoice->status->name
            . ', ' . $invoice->created_at->format('d.m.Y') . PHP_EOL;


        /** @var InvoiceItem $item */
        $item = $invoice->items->first();
        $item->description = 'Foo Bar';
        //$item->save();

        $invoice->invoice_number = '3';

        $invoice->push();
    });