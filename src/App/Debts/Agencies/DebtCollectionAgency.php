<?php

namespace App\Debts\Agencies;

use App\Debts\Abstract\Company;
use App\Debts\Interfaces\DebtCollectorInterface;

class DebtCollectionAgency extends Company implements DebtCollectorInterface
{
    public function collect(float $ownedMoney): float
    {
        $rate = rand(50, 85) / 100;
        return $ownedMoney * $rate;
    }
}