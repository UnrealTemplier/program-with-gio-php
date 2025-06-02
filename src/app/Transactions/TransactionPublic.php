<?php

declare(strict_types=1);

namespace App\Transactions;

class TransactionPublic
{
    public int $amount = 0;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }
}