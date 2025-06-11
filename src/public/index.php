<?php

use App\Customer;
use App\Exception\MissingBillingInfoException;
use App\Order;

require_once './../vendor/autoload.php';
require_once './../helpers.php';

$order1 = new Order(new Customer(), 25);

try {
    $order1->process();
} catch (InvalidArgumentException|MissingBillingInfoException $e) {
    print_line($e->getMessage() . ' ' . $e->getFile() . ':' . $e->getLine());
} finally {
    print_line('Finally!');
}