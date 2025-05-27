<?php

declare(strict_types=1);

namespace PaymentGateway\Paddle;

require_once __DIR__ . '/../../Notification/Email.php';

class Transaction
{
    public function __construct()
    {
        $email = new \Notification\Email;
        var_dump($email);
        print_line();
    }
}