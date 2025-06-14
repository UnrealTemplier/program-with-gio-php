<?php

declare(strict_types=1);

use App\Exceptions\RouteNotFoundException;
use App\Router;

const STORAGE_PATH = __DIR__ . '/../storage';
const VIEWS_PATH = __DIR__ . '/../views';

session_start();

require_once './../vendor/autoload.php';
require_once './../helpers.php';

try {
    $router = new Router();
    $router
        ->get('/', [App\Controllers\HomeController::class, 'index'])
        ->post('/upload', [App\Controllers\HomeController::class, 'upload'])
        ->get('/invoices', [App\Controllers\InvoicesController::class, 'index'])
        ->get('/invoices/create', [App\Controllers\InvoicesController::class, 'create'])
        ->post('/invoices/create', [App\Controllers\InvoicesController::class, 'store']);
    $uri = $_SERVER['REQUEST_URI'];
    $method = $_SERVER['REQUEST_METHOD'];
    echo $router->resolve($uri, $method);
} catch (RouteNotFoundException $e) {
    http_response_code(404);
    print_line($e->getMessage());
}
