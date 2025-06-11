<?php

declare(strict_types=1);

require_once './../vendor/autoload.php';
require_once './../helpers.php';

$date1 = new DateTime('05/25/2001 9:14AM');
$date2 = new DateTime('05/25/2001 9:15AM');

d($date1 < $date2);
d($date1 > $date2);
d($date1 == $date2);
d($date1 <=> $date2);

print_line('------------------------');

$date1 = new DateTime('05/25/2001 9:15AM');
$date2 = new DateTime('05/25/2001 9:15AM');

d($date1 < $date2);
d($date1 > $date2);
d($date1 == $date2);
d($date1 <=> $date2);