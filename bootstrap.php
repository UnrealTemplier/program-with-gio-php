<?php

use Dotenv\Dotenv;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/configs/path_constants.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$container = require_once CONFIG_PATH . '/container.php';
AppFactory::setContainer($container);
return AppFactory::create();
