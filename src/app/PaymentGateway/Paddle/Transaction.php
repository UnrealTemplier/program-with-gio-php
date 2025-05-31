<?php

declare(strict_types=1);

namespace App\PaymentGateway\Paddle;

use App\Enums\Status;

class Transaction
{
    private static int $count = 0;

    public function __construct()
    {
        self::$count++;
    }

    public static function getCount()
    {
        return self::$count;
    }
}
