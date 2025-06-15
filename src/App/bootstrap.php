<?php

use App\Config;
use App\Controllers\HomeController;
use App\Controllers\InvoicesController;
use App\Router;
use Dotenv\Dotenv;

const STORAGE_PATH = __DIR__ . '/../storage';
const VIEWS_PATH = __DIR__ . '/../views';

session_start();

require_once './../vendor/autoload.php';
require_once './../helpers.php';

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$router = new Router();
$router
    ->get('/', [HomeController::class, 'index'])
    ->post('/upload', [HomeController::class, 'upload'])
    ->get('/invoices', [InvoicesController::class, 'index'])
    ->get('/invoices/create', [InvoicesController::class, 'create'])
    ->post('/invoices/create', [InvoicesController::class, 'store']);

$request = [
    'uri' => $_SERVER['REQUEST_URI'],
    'method' => $_SERVER['REQUEST_METHOD']
];

$config = new Config($_ENV);

return [$router, $request, $config];
