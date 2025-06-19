<?php

use App\Config;
use App\Container;
use App\Controllers\GeneratorExampleController;
use App\Controllers\HomeController;
use App\Controllers\InvoicesController;
use App\Router;
use Dotenv\Dotenv;

const STORAGE_PATH = __DIR__ . '/../storage';
const VIEWS_PATH = __DIR__ . '/../views';

session_start();

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../helpers.php';

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$container = new Container();

$router = new Router($container);

$router->registerRoutesFromControllerAttributes(
    [
        HomeController::class,
        InvoicesController::class,
        GeneratorExampleController::class
    ]
);

$request = [
    'uri' => $_SERVER['REQUEST_URI'],
    'method' => $_SERVER['REQUEST_METHOD']
];

$config = new Config($_ENV);

return [$container, $router, $request, $config];
