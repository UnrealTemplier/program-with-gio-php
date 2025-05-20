<?php

declare(strict_types=1);

require_once './../helpers.php';
require_once '../Transaction.php';

// object's destructor will be called as soon
// as the object's reference not needed anymore
// e.g. create object on the fly (without variable holding its reference)
$amount1 = (new Transaction(100, 'Transaction 1'))
    ->addTax(8)
    ->addDiscount(10)
    ->getAmount();

var_dump($amount1);


echo '<br/>';
echo '<br/>';

// if there's a variable holding a reference to an object
// then the object's destructor will be called at the end of the script
$transaction2 = (new Transaction(100, 'Transaction 2'))
    ->addTax(8)
    ->addDiscount(10);

var_dump($transaction2->getAmount());


echo '<br/>';
echo '<br/>';

// objects' destructors are called at the end of the script
// in reverse order of creation
// e.g.
// Transaction1 constructor
// Transaction2 constructor
// Transaction3 constructor
// Transaction3 destructor
// Transaction2 destructor
// Transaction1 destructor
$transaction3 = (new Transaction(100, 'Transaction 3'))
    ->addTax(8)
    ->addDiscount(10);

$amount3 = $transaction3->getAmount();

var_dump($amount3);


echo '<br/>';
echo '<br/>';

$transaction4 = (new Transaction(100, 'Transaction 4'))
    ->addTax(8)
    ->addDiscount(10);

$amount4 = $transaction4->getAmount();

// unset object or assign it to null
// will call the object's destructor immediately
//$transaction4 = null;
unset($transaction4);

// if exit called then ALL destructors will be called
// immediately no matter what
//exit;

var_dump($amount4);