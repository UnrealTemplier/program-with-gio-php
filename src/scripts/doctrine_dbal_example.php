<?php

declare(strict_types=1);

use App\App;
use Doctrine\DBAL\ArrayParameterType;
use Doctrine\DBAL\DriverManager;

/** @var App $app */
$app = require_once __DIR__ . '/boostrap_cli.php';
$app->boot();

$connectionParams = [
    'dbname' => $_ENV['DB_NAME'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'host' => $_ENV['DB_HOST'],
    'driver' => $_ENV['DB_DRIVER'] ?? 'pdo_mysql',
];

$conn = DriverManager::getConnection($connectionParams);

$schemaManager = $conn->createSchemaManager();
$columns = array_keys($schemaManager->listTableColumns('users'));
print_array($columns);