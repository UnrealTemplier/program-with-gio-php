<?php

declare(strict_types=1);

require_once './../vendor/autoload.php';
require_once './../helpers.php';

$dateTime = new DateTime('03/15/2000 3:30PM');

print_line($dateTime->getTimezone()->getName() . ' - ' . $dateTime->format('m/d/Y g:i A'));

$dateTime->setTimezone(new DateTimeZone('Europe/Amsterdam'))->setDate(2020, 05, 01)->setTime(14, 35);

print_line($dateTime->getTimezone()->getName() . ' - ' . $dateTime->format('m/d/Y g:i A'));