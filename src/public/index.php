<?php

declare(strict_types=1);

use App\Customer;
use App\Exception\OrderException;
use App\Order;

require_once './../vendor/autoload.php';
require_once './../helpers.php';

$order = new Order(new Customer(), 24);

try {
    $order->process();
} catch (OrderException $e) {
    print_line($e->getMessage());
}

$order = new Order(new Customer(), 25);

try {
    $order->process();
} catch (OrderException $e) {
    print_line($e->getMessage());
}