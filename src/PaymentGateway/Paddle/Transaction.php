<?php

declare(strict_types=1);

namespace PaymentGateway\Paddle;

class Transaction
{
    public function __construct()
    {
        var_dump(explode(',', 'Hello,world'));

        print_line();

        var_dump(\explode(',', 'Hello,world'));

        print_line();
        print_line();
    }
}

function explode(string $separator, string $string): string
{
    return 'foo';
}