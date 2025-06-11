<?php

namespace App;

use App\Exception\MissingBillingInfoException;
use InvalidArgumentException;

class Order
{
    public function __construct(
        public Customer $customer,
        public int $amount,
    ) {}

    /**
     * @throws InvalidArgumentException
     * @throws MissingBillingInfoException
     */
    public function process(): void
    {
        if ($this->amount < 25) {
            throw new InvalidArgumentException('Amount is too low');
        }

        if (empty($this->customer->address)) {
            throw new MissingBillingInfoException('Custom message');
        }
    }
}