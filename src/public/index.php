<?php

declare(strict_types=1);

require_once './../vendor/autoload.php';
require_once './../helpers.php';

use App\Transactions\TransactionGetterSetter;
use App\Transactions\TransactionHooks;
use App\Transactions\TransactionPublic;
use App\Transactions\TransactionReadonly;

print_line('Normal class with public property:');
$transactionPublic = new TransactionPublic(25);
print_line('Get property directly: ' . $transactionPublic->amount);
print_line('Changing property directly...');
$transactionPublic->amount = 125;
print_line('Get property directly: ' . $transactionPublic->amount);

print_line();
print_line();

print_line('Readonly class with readonly private property and getter only:');
$transactionReadonly = new TransactionReadonly(25);
print_line('Get property with getter: ' . $transactionReadonly->getAmount());
// Property modifying is not allowed! Fatal error will be thrown!
//$transactionReadonly->amount = 125;

print_line();
print_line();

print_line('Normal class with getter and setter:');
$transactionGetSet = new TransactionGetterSetter(25);
print_line('Get property with getter: ' . $transactionGetSet->getAmount());
print_line('Changing property with setter...');
$transactionGetSet->setAmount(125);
print_line('Get property with getter: ' . $transactionGetSet->getAmount());

print_line();
print_line();

print_line('Normal class with get and set hooks:');
$transactionHooks = new TransactionHooks(25);
print_line('Get property with get hook: ' . $transactionHooks->amount);
print_line('Changing property with set hook...');
$transactionHooks->amount = 125;
print_line('Get property with get hook: ' . $transactionHooks->amount);