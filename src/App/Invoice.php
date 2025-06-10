<?php

namespace App;

class Invoice
{
    public ?Invoice $linkedInvoice = null;

    public function __construct(
        public float $amount,
        public string $description,
    ) {}
}