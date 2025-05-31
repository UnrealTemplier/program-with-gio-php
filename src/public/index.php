<?php

declare(strict_types=1);

require_once './../vendor/autoload.php';
require_once './../helpers.php';

use App\PaymentGateway\Paddle\Transaction;

$id = new \Ramsey\Uuid\UuidFactory();
echo $id->uuid4();

print_line();
print_line();

var_dump(new Transaction());
