<?php

declare(strict_types=1);

require_once __DIR__ . '/Customer.php';

class Transaction
{
    public ?Customer $customer = null;

    public function __construct(
        public float $amount,
        public string $description,
    ) {}
}