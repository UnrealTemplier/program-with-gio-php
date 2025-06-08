<?php

namespace App\Debts\Interfaces;

interface DebtCollectorInterface
{
    public function collect(float $ownedMoney): float;
}