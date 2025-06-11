<?php

declare(strict_types=1);

require_once './../vendor/autoload.php';
require_once './../helpers.php';

$date1 = new DateTime('05/25/2001 9:14AM');
$date2 = new DateTime('03/15/2001 3:53AM');

print_line('Total days diff: ' . $date1->diff($date2)->days);
print_line('Full diff: ' . $date1->diff($date2)->format('%Y years, %m months, %d days, %H hours, %i minutes, %s seconds'));
print_line('Formatted total days diff: ' . $date1->diff($date2)->format('%a total days'));
print_line('Formatted SIGNED total days diff: ' . $date1->diff($date2)->format('%R%a total days'));