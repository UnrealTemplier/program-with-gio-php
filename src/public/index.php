<?php

declare(strict_types=1);

require_once './../helpers.php';
require_once '../Transaction.php';

$json = '{"a": 1, "b": 2, "c": 3}';

// decode JSON to associative array
//$decode = json_decode($json, true);

// decode JSON to stdClass object
$decode = json_decode($json);

var_dump($decode);

printLn();
printLn();

// JSON keys can be used as object's properties
// if we decoded JSON to stdClass object
printLn($decode->a);
printLn($decode->b);
printLn($decode->c);

printLn();
printLn();

// we can create empty stdClass object
// and assign arbitrary properties
$obj = new \stdClass();
$obj->a = 10;
$obj->b = 20;

var_dump($obj);

printLn();
printLn();

// we can convert array to stdClass object
// by casting to object
$arr = ['A', 'B', 'C'];
$obj = (object)$arr;

// cast object will receive array indices as keys
var_dump($obj);

printLn();

// to use numeric keys on objects
// we must surround them with curly braces
printLn($obj->{1});


printLn();
printLn();

// when we convert scalar value to stdClass object
// then the key will be 'scalar'
$obj1 = (object)1;
$obj2 = (object)true;

var_dump($obj1);
printLn();
var_dump($obj2);

printLn();
var_dump($obj1->scalar);

printLn();
var_dump($obj2->scalar);