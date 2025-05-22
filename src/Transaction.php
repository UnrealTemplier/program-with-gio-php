<?php

declare(strict_types=1);

class Transaction
{
    public function __construct(
        public float $amount,
        public string $description = 'Default',
        private ?string $name = null,
    ) {
        printLn($amount);
        printLn($this->amount);
        printLn($this->description);
        var_dump($this->name);
    }
}