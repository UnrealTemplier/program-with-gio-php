<?php

declare(strict_types=1);

use App\Toaster;
use App\ToasterPro;

require_once './../vendor/autoload.php';
require_once './../helpers.php';

// Choose base class of derived class
// to test toast() function

//$toaster = new Toaster();
$toaster = new ToasterPro('additional parameter');

$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');

toast($toaster);

// This function receives all Toaster objects and Toaster descendants objects
function toast(Toaster $toaster): void
{
    $toaster->toast();
}