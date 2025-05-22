<?php

declare(strict_types=1);

require_once './../helpers.php';
require_once '../Transaction.php';

new Transaction(15);

printLn();
printLn();

new Transaction(20, 'Custom description', 'Migele');