<?php

declare(strict_types=1);

use App\Router;

require_once './../vendor/autoload.php';
require_once './../helpers.php';

$router = new Router();

$router
    ->register('/', function() { echo 'Home'; })
    ->register('/invoices', function() { echo 'Invoices'; });

echo $router->resolve($_SERVER['REQUEST_URI']);
