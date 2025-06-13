<?php

declare(strict_types=1);

use App\Router;

session_start();

require_once './../vendor/autoload.php';
require_once './../helpers.php';

$router = new Router();

$router
    ->get('/', [App\Classes\Home::class, 'index'])
    ->get('/invoices', [App\Classes\Invoice::class, 'index'])
    ->get('/invoices/create', [App\Classes\Invoice::class, 'create'])
    ->post('/invoices/create', [App\Classes\Invoice::class, 'store']);

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
echo $router->resolve($uri, $method);

d($_SESSION);

d($_COOKIE);
