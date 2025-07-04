<?php

declare(strict_types=1);

use Dotenv\Dotenv;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../configs/path_constants.php';

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$container = require_once CONFIG_PATH . '/container.php';
$registerRoutes = require_once CONFIG_PATH . '/routes.php';

AppFactory::setContainer($container);

$app = AppFactory::create();

$registerRoutes($app);

$app->add(TwigMiddleware::create($app, $container->get(Twig::class)));

$app->run();