<?php

declare(strict_types=1);

require_once './../vendor/autoload.php';
require_once './../helpers.php';

use App\Enums\Status;
use App\PaymentGateway\Paddle\Transaction;

$transaction = new Transaction();

print_line($transaction->status);

print_line();

$transaction->setStatus(Status::PAID);
print_line($transaction->status);

print_line();

print_line('Trying to set abracadbra status:');
$transaction->setStatus('abracadabra');
print_line($transaction->status);

