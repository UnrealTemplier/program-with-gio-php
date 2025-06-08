<?php

namespace App\Debts\Agencies;

use App\Debts\Interfaces\DebtCollectorInterface;

class UnknownAgency implements DebtCollectorInterface
{
    public function collect(float $ownedMoney): float
    {
        $rate = rand(30, 70) / 100;
        return $ownedMoney * $rate;
    }
}