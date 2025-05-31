<?php

declare(strict_types=1);

namespace App\PaymentGateway\Paddle;

use App\Enums\Status;

class Transaction
{
    private const array ALL_STATUSES = [
        Status::PAID => 'paid',
        Status::PENDING => 'pending',
        Status::DECLINED => 'declined'
    ];

    public string $status;

    public function __construct()
    {
        $this->setStatus(Status::PENDING);
    }

    /**
     * @param string $status
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setStatus(string $status): self
    {
        if (!isset(self::ALL_STATUSES[$status]))
            throw new \InvalidArgumentException('Incorrect status.');

        $this->status = $status;
        return $this;
    }
}
