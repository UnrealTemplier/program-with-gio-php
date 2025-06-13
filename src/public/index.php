<?php

declare(strict_types=1);

use App\Router;

require_once './../vendor/autoload.php';
require_once './../helpers.php';

$router = new Router();

$router
    ->register('/', [App\Classes\Home::class, 'index'])
    ->register('/invoices', [App\Classes\Invoice::class, 'index'])
    ->register('/invoices/create', [App\Classes\Invoice::class, 'create']);

echo $router->resolve($_SERVER['REQUEST_URI']);
