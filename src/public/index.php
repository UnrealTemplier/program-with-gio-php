<?php

declare(strict_types=1);

require_once './../vendor/autoload.php';
require_once './../helpers.php';

$date = '15/03/2033';
$dateTime = DateTime::createFromFormat('d/m/Y', $date)->setTime(0, 0);

d($dateTime);