<?php

use App\Customer;
use App\Exception\MissingBillingInfoException;
use App\Order;

require_once './../vendor/autoload.php';
require_once './../helpers.php';

function process(): int|bool
{
    $order1 = new Order(new Customer(), 25);

    try {
        $order1->process();
        return true;
    } catch (InvalidArgumentException|MissingBillingInfoException $e) {
        print_line($e->getMessage() . ' ' . $e->getFile() . ':' . $e->getLine());
        return false;
    } finally {
        print_line('Finally!');
        return -1;
    }
}

d(process());