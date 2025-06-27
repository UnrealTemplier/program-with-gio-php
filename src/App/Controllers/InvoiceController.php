<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Attributes\Get;
use App\Enums\InvoiceStatus;
use App\Models\Invoice;
use App\View;

readonly class InvoiceController
{
    #[Get('/invoices')]
    public function index(): View
    {
        $invoices = Invoice::query()->get()->toArray();

        $invoices = array_map(function($invoice) {
            $invoice['status'] = InvoiceStatus::tryFrom($invoice['status'])->toString();
            return $invoice;
        }, $invoices);

        return View::make('invoices/index', compact('invoices'));
    }
}
