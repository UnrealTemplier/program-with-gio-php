<?php

namespace App;

use App\Exception\OrderException;

class Order
{
    public function __construct(
        public Customer $customer,
        public int $amount,
    ) {}

    /**
     * @throws OrderException
     */
    public function process(): void
    {
        if ($this->amount < 25) {
            throw OrderException::invalidAmount();
        }

        if (empty($this->customer->address)) {
            throw OrderException::missingBillingInfo();
        }
    }
}