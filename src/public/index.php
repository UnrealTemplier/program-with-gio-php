<?php

declare(strict_types=1);

require_once './../helpers.php';
require_once '../PaymentGateway/Stripe/Transaction.php';
require_once '../PaymentGateway/Paddle/Transaction.php';

// import whole namespace
use PaymentGateway\Paddle;

// import whole namespace with an alias
use PaymentGateway\Paddle as PGPaddle;

// import classes with aliases
use PaymentGateway\Paddle\Transaction as PaddleTransaction;
use PaymentGateway\Stripe\Transaction as StripeTransaction;

// group class imports by namespace
use PaymentGateway\Paddle\{Transaction, CustomerProfile};

var_dump(new PaddleTransaction());

print_line();
print_line();

var_dump(new StripeTransaction());