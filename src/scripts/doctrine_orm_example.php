<?php

declare(strict_types=1);

use App\App;
use App\Entity\Invoice;
use App\Entity\InvoiceItem;
use App\Enums\InvoiceStatus;
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

$items = [
    ['Item 1', 1, 15],
    ['Item 2', 2, 7.5],
    ['Item 3', 4, 3.75],
];

//$invoice = new Invoice()
//    ->setAmount(45)
//    ->setInvoiceNumber('1')
//    ->setStatus(InvoiceStatus::Pending)
//    ->setCreatedAt(new DateTime());
//
//foreach ($items as [$description, $quantity, $unitPrice]) {
//    $item = new InvoiceItem()
//        ->setDescription($description)
//        ->setQuantity($quantity)
//        ->setUnitPrice($unitPrice);
//
//    $invoice->addItem($item);
//}
//
//$entityManager->persist($invoice);
//$entityManager->flush();
//
//$entityManager->remove($invoice);
//$entityManager->flush();

$invoice = $entityManager->find(Invoice::class, 25);
$invoice->setStatus(InvoiceStatus::Paid);
$invoice->getItems()->get(0)->setDescription('Foo Bar');

$entityManager->flush();
