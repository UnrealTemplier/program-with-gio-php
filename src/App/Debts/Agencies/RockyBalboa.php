<?php

namespace App\Debts\Agencies;

use App\Debts\Abstract\Company;
use App\Debts\Interfaces\DebtCollectorInterface;

class RockyBalboa extends Company implements DebtCollectorInterface
{
    public function collect(float $ownedMoney): float
    {
        $rate = 0.65;
        return $ownedMoney * $rate;
    }
}