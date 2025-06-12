<?php

namespace App;

class Invoice
{
    public string $id;

    public function __construct(public float $amount)
    {
        $this->id = uniqid('invoice_');
    }
}
