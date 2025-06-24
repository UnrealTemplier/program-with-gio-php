<?php

declare(strict_types=1);

use App\App;
use App\Entity\Invoice;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

/** @var App $app */
$app = require_once __DIR__ . '/boostrap_cli.php';
$app->boot();

$config = ORMSetup::createAttributeMetadataConfiguration(
    [__DIR__ . '/../App/Entity'],
    isDevMode: true,
);

$connectionParams = [
    'dbname' => $_ENV['DB_NAME'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'host' => $_ENV['DB_HOST'],
    'driver' => $_ENV['DB_DRIVER'] ?? 'pdo_mysql',
];

$connection = DriverManager::getConnection($connectionParams, $config);
$entityManager = new EntityManager($connection, $config);

$queryBuilder = $entityManager->createQueryBuilder();

$query = $queryBuilder
    ->select('i')
    ->from(Invoice::class, 'i')
    ->where('i.amount > :amount')
    ->setParameter('amount', 40)
    ->orderBy('i.createdAt', 'desc')
    ->getQuery();

$invoices = $query->getArrayResult();
print_array($invoices);

//$invoices = $query->getResult();

///** @var Invoice $invoice */
//foreach ($invoices as $invoice) {
//    echo ' - ' . $invoice->getCreatedAt()->format('d.m.Y G:i')
//        . ', ' . $invoice->getAmount()
//        . ', ' . $invoice->getStatus()->name . PHP_EOL;
//}