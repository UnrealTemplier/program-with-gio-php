<?php

declare(strict_types=1);

require_once './../vendor/autoload.php';
require_once './../helpers.php';

use App\PaymentGateway\Paddle\Transaction;

$transaction = new Transaction();

print_line($transaction->status);

print_line();

$transaction->setStatus(Transaction::STATUS_PAID);
print_line($transaction->status);

print_line();

print_line('Trying to set abracadbra status:');
$transaction->setStatus('abracadabra');
print_line($transaction->status);

