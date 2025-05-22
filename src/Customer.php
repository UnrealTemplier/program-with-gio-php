<?php

declare(strict_types=1);

require_once __DIR__ . '/PaymentProfile.php';

class Customer
{
    public ?PaymentProfile $paymentProfile = null;
}