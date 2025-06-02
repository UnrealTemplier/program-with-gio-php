<?php

declare(strict_types=1);

namespace App\Transactions;

class TransactionGetterSetter
{
    private int $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $value): void
    {
        $this->amount = $value;
    }
}