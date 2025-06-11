<?php

namespace App\Exception;

class OrderException extends \Exception
{
    public static function invalidAmount(): static
    {
        return new static('Invalid amount');
    }

    public static function missingBillingInfo(): static
    {
        return new static('Missing billing information');
    }
}