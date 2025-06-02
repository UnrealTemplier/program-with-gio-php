<?php

declare(strict_types=1);

namespace App\Transactions;

readonly class TransactionReadonly
{
    private int $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function getAmount()
    {
        return $this->amount;
    }
}