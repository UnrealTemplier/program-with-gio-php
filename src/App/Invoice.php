<?php

namespace App;

class Invoice
{
    public function __construct(
        public Customer $customer,
        public float $amount,
        public string $description,
    ) {}
}