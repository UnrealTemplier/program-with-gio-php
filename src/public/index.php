<?php

declare(strict_types=1);

require_once './../vendor/autoload.php';
require_once './../helpers.php';

use App\Enums\Status;
use App\PaymentGateway\Paddle\Transaction;

$transaction = new Transaction();
print_line(Transaction::getCount());

$transaction = new Transaction();
print_line(Transaction::getCount());

$transaction = new Transaction();
print_line(Transaction::getCount());

$transaction = new Transaction();
print_line(Transaction::getCount());
