<?php

declare(strict_types=1);

require_once './../helpers.php';

spl_autoload_register(function($path) {
    $path = __DIR__ . '/../' . lcfirst(str_replace('\\', '/', $path) . '.php');
    require_once $path;
});

use App\PaymentGateway\Paddle\Transaction;

var_dump(new Transaction());