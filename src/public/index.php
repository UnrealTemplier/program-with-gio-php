<?php

declare(strict_types=1);

require_once './../vendor/autoload.php';
require_once './../helpers.php';

use App\PaymentGateway\Paddle\Transaction;

$transaction = new Transaction();

// using class constants
print_line($transaction->status);
$transaction->setStatus(Transaction::STATUS_PAID);
print_line($transaction->status);

print_line();

// from class ref and from object ref
print_line(Transaction::STATUS_DECLINED);
print_line($transaction::STATUS_PAID);

print_line();


