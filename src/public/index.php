<?php

declare(strict_types=1);

require_once './../vendor/autoload.php';
require_once './../helpers.php';

$date = new DateTime('05/25/2001 9:14AM');
$interval = new DateInterval('P3M');

print_line('Original: ' . $date->format('d.m.Y g:i'));

$date->add($interval);
print_line('Added 3 months: ' . $date->format('d.m.Y g:i'));

$date->sub($interval);
print_line('Subtracted 3 months: ' . $date->format('d.m.Y g:i'));

$interval->invert = 1;
$date->add($interval);
print_line('Added 3 months INVERTED: ' . $date->format('d.m.Y g:i'));

print_line('--------------------------');

$interval->invert = 0;

$from = new DateTimeImmutable();
$to = (clone $from)->add($interval);

print_line('from:');
d($from);
print_line('to:');
d($to);

print_line('from equal to to:');
d($from === $to);

print_line('to subbed:');
$to = $to->sub($interval);
d($to);