<?php

declare(strict_types=1);

$object1 = new stdClass();
$map = new WeakMap();

$map[$object1] = 'This is object 1';

echo $map[$object1] . PHP_EOL;

echo 'WeakMap count: ' . count($map) . PHP_EOL;
echo 'Unsetting $object1...' . PHP_EOL;
unset($object1);
echo 'WeakMap count: ' . count($map) . PHP_EOL;


