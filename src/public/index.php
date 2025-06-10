<?php

declare(strict_types=1);

require_once './../vendor/autoload.php';
require_once './../helpers.php';

$invoice = new App\Invoice();

$invoice->process(25, 'This is my description');
