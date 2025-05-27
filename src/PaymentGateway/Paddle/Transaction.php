<?php

declare(strict_types=1);

namespace PaymentGateway\Paddle;

require_once __DIR__ . '/CustomerProfile.php';

class Transaction
{
    public function __construct(public CustomerProfile $customerProfile)
    {
        $dateTime = new \DateTime;
    }
}