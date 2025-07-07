<?php

declare(strict_types=1);

use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

$app = require_once __DIR__ . '/../bootstrap.php';
$container = $app->getContainer();

$registerRoutes = require_once CONFIG_PATH . '/routes.php';
$registerRoutes($app);

$app->add(TwigMiddleware::create($app, $container->get(Twig::class)));
$app->run();