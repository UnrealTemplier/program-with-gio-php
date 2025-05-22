<?php

declare(strict_types=1);

require_once './../helpers.php';
require_once '../Transaction.php';

$transaction = new Transaction(15, 'Default');
$transaction->customer = new Customer();

printLn($transaction->customer?->paymentProfile?->id);