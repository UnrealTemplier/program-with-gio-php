<?php

namespace App\Debts\Abstract;

abstract class Company
{
    public function __construct(public string $name) {}
}