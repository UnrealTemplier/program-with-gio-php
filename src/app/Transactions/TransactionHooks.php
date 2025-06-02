<?php

declare(strict_types=1);

namespace App\Transactions;

class TransactionHooks
{
    public int $amount {
        get {
            return $this->amount;
        }
        set {
            $this->amount = $value;
        }
    }

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

}