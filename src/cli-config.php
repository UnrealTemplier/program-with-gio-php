<?php

declare(strict_types=1);

use App\App;
use Doctrine\DBAL\DriverManager;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\Configuration\Migration\YamlFile;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

/** @var App $app */
$app = require_once __DIR__ . '/scripts/boostrap_cli.php';
$app->boot();

$config = new YamlFile('migrations.yml');
$ORMConfig = ORMSetup::createAttributeMetadataConfiguration([__DIR__ . '/App/Entity'], isDevMode: true);

$connectionParams = [
    'dbname' => $_ENV['DB_NAME'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'host' => $_ENV['DB_HOST'],
    'driver' => $_ENV['DB_DRIVER'] ?? 'pdo_mysql',
];
$connection = DriverManager::getConnection($connectionParams, $ORMConfig);
$entityManager = new EntityManager($connection, $ORMConfig);

return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));