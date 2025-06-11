<?php

namespace App;

class Invoice
{
    private string $id;

    public function __construct(
        public int $amount,
        public string $description,
        private string $creditCardNumber,
    ) {
        $this->assignId();
    }

    private function assignId(): void
    {
        $this->id = uniqid('invoice_');
    }

    public function __clone(): void
    {
        $this->assignId();
    }

    public function __sleep(): array
    {
        return ['id', 'amount'];
    }

    public function __wakeup(): void
    {
        $this->creditCardNumber = '000111222333';
    }

    public function __serialize(): array
    {
        return [
            'id' => $this->id,
            'amount' => $this->amount,
            'description' => $this->description,
            'creditCardNumber' => base64_encode($this->creditCardNumber),
        ];
    }

    public function __unserialize(array $data): void
    {
        $this->id = $data['id'];
        $this->amount = $data['amount'];
        $this->description = $data['description'];
        $this->creditCardNumber = base64_decode($data['creditCardNumber']);
    }
}