<?php

declare(strict_types=1);

require_once './../vendor/autoload.php';
require_once './../helpers.php';

use App\PaymentGateway\Paddle\Transaction;

// We can implement Factory pattern using statics
// to construct and return requested objects
// Is's not working code, just for example.

// $transaction = TransactionFactory::make(1, 'Name');

$transaction = new Transaction();
// For static properties retrieval
// we can use either :: or ->
// but -> is not good 'cause it hides property's static nature
var_dump($transaction::getCount());
var_dump($transaction->getCount());

print_line();
print_line();

print_line('Transaction amount:');
var_dump($transaction->amount);

print_line();
print_line();


// Using non-static closure we can modify
// object's properties => not good...
$transaction->process();
print_line('Transaction amount:');
var_dump($transaction->amount);

print_line();
print_line();

// Using static closure we can't modify
// object's properties => GOOD!
// PHP will throw a fatal error
$transaction->processStatic();
print_line('Transaction amount:');
var_dump($transaction->amount);