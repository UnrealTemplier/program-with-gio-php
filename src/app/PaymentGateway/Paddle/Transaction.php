<?php

declare(strict_types=1);

namespace App\PaymentGateway\Paddle;

class Transaction
{
    private static int $count = 0;

    public int $amount = 25;

    public function __construct()
    {
        self::$count++;
    }

    public static function getCount(): int
    {
        return self::$count;
    }

    public function process(): void
    {
        array_map(function () {
            $this->amount = 35;
        }, [1]);

        echo 'Processing transaction non-statically<br/>';
    }

    public function processStatic(): void
    {
        array_map(static function () {
            $this->amount = 45;
        }, [1]);

        echo 'Processing transaction statically<br/>';
    }
}
