<?php

declare(strict_types=1);

namespace PaymentGateway\Paddle;

// import duplicate name with an alias
use PaymentGateway\Stripe\Transaction as StripeTransaction;

class Transaction
{
    public function __construct()
    {
        $stripeTransaction = new StripeTransaction();
    }
}