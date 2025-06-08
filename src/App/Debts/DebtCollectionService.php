<?php

namespace App\Debts;

use App\Debts\Abstract\Company;
use App\Debts\Interfaces\DebtCollectorInterface;

class DebtCollectionService
{
    public function collect(DebtCollectorInterface $collector): string
    {
        $name = match ($collector instanceof Company) {
            true => $collector->name,
            default => 'Unknown company'
        };

        $ownedMoney = rand(100, 1000);
        $collectedMoney = $collector->collect($ownedMoney);

        return $name . ' collected $' . $collectedMoney . ' out of $' . $ownedMoney . '.';
    }
}