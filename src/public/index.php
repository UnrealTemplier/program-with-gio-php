<?php

declare(strict_types=1);

require_once './../vendor/autoload.php';
require_once './../helpers.php';

print_line('Iterating DatePeriod over 1 month by 1 day (including end date):');

$period = new DatePeriod(
    new DateTime('01.01.2001'),
    new DateInterval('P1D'),
    new DateTime('31.01.2001'),
    DatePeriod::INCLUDE_END_DATE,
);

foreach ($period as $date) {
    print_line($date->format('d.m.Y'));
}

print_line();
print_line('----------------------');
print_line();

print_line('Iterating DatePeriod over 12 days by 3 days:');

$period = new DatePeriod(
    new DateTime('01.01.2001'),
    new DateInterval('P3D'),
    new DateTime('12.01.2001'),
);

foreach ($period as $date) {
    print_line($date->format('d.m.Y'));
}

print_line();
print_line('----------------------');
print_line();

print_line('Iterating DatePeriod over 15 days by 3 recurrencies (excluding start date):');

$period = new DatePeriod(
    new DateTime('01.01.2001'),
    new DateInterval('P3D'),
    3, DatePeriod::EXCLUDE_START_DATE,
);

foreach ($period as $date) {
    print_line($date->format('d.m.Y'));
}