<?php

declare(strict_types=1);

require_once './../helpers.php';
require_once '../PaymentGateway/Stripe/Transaction.php';
require_once '../PaymentGateway/Paddle/Transaction.php';

use PaymentGateway\Paddle\Transaction;

var_dump(new Transaction());

print_line();
print_line();

var_dump(new PaymentGateway\Stripe\Transaction());