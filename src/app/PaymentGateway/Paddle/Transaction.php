<?php

declare(strict_types=1);

namespace App\PaymentGateway\Paddle;

use Ramsey\Uuid\Exception\InvalidArgumentException;

class Transaction
{
    public const string STATUS_PAID = 'paid';
    public const string STATUS_PENDING = 'pending';
    public const string STATUS_DECLINED = 'declined';

    private const array ALL_STATUSES = [
        self::STATUS_PAID => 'paid',
        self::STATUS_PENDING => 'pending',
        self::STATUS_DECLINED => 'declined'
    ];

    public string $status;

    public function __construct()
    {
        $this->setStatus(Transaction::STATUS_PENDING);
    }

    /**
     * @param string $status
     * @return $this
     *
     * @throws InvalidArgumentException
     */
    public function setStatus(string $status): self
    {
        if (!isset(self::ALL_STATUSES[$status]))
            throw new InvalidArgumentException('Incorrect status.');

        $this->status = $status;
        return $this;
    }
}
