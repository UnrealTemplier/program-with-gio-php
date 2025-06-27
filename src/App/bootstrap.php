<?php

use App\App;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use App\Router;
use Illuminate\Container\Container;

const STORAGE_PATH = __DIR__ . '/../storage';
const VIEWS_PATH = __DIR__ . '/../views';

session_start();

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../helpers.php';

$container = new Container();
$router = new Router($container);

$router->registerRoutesFromControllerAttributes(
    [
        HomeController::class,
        InvoiceController::class,
    ],
);

$request = [
    'uri' => $_SERVER['REQUEST_URI'],
    'method' => $_SERVER['REQUEST_METHOD'],
];

return new App($container, $router, $request)->boot();
