<?php

declare(strict_types=1);

namespace App\PaymentGateway\Paddle;

class Transaction
{
    public const string STATUS_PAID = 'paid';
    public const string STATUS_PENDING = 'pending';
    public const string STATUS_DECLINED = 'declined';

    private const string PRIVATE_CONST = 'private';

    public string $status;

    public function __construct()
    {
        $this->setStatus(Transaction::PRIVATE_CONST);

        print_line('From Transaction constructor:');
        print_line('$this->status: ' . $this->status);
        print_line('$this::STATUS_PAID: ' . $this::STATUS_PAID);
        print_line('self::STATUS_DECLINED: ' . self::STATUS_DECLINED);
        print_line();
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }
}
