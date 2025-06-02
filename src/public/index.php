<?php

declare(strict_types=1);

require_once './../vendor/autoload.php';
require_once './../helpers.php';

use App\DB;

// If we don't use singleton pattern
// then every instantiation will call the constructor
//$db = new DB([]);
//$db = new DB([]);
//$db = new DB([]);
//$db = new DB([]);
//$db = new DB([]);

// If we use singleton pattern
// then constructor will be called only once
$db = DB::getInstance([]);
$db = DB::getInstance([]);
$db = DB::getInstance([]);
$db = DB::getInstance([]);
$db = DB::getInstance([]);