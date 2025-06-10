<?php

namespace App;

class Invoice
{
    public function __construct(
        public float $amount,
        public string $description,
    ) {}
}