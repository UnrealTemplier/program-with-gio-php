<?php

declare(strict_types=1);

use App\App;
use Doctrine\DBAL\ArrayParameterType;

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

$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);



//$result = $conn->executeQuery('SELECT * FROM users');
//print_array($result->fetchAllAssociative());




//$stmt = $conn->prepare('SELECT * FROM invoices');
//$result = $stmt->executeQuery();
//print_array($result->fetchAllAssociative());




//$stmt = $conn->prepare('SELECT * FROM invoices WHERE id = ?');
//$stmt->bindValue(1, 3);
//$result = $stmt->executeQuery();
//print_array($result->fetchAssociative());




//$stmt = $conn->prepare('SELECT * FROM invoices WHERE id = :id');
//$stmt->bindValue(':id', 2);
//$result = $stmt->executeQuery();
//print_array($result->fetchAssociative());




//$from = new DateTime('2025-06-15 00:00:00');
//$to = new Datetime('2025-06-16 00:00:00');
//
//$stmt = $conn->prepare('
//    SELECT id, full_name
//    FROM users
//    WHERE created_at
//    BETWEEN :from AND :to'
//);
//
//$stmt->bindValue(':from', $from, 'datetime');
//$stmt->bindValue(':to', $to, 'datetime');
//
//$result = $stmt->executeQuery();
//print_array($result->fetchAllAssociative());




//$ids = [1, 3, 7];
//$result = $conn->executeQuery(
//    'SELECT *
//     FROM users
//     WHERE id IN (?)',
//    [$ids], [ArrayParameterType::INTEGER]
//);
//print_array($result->fetchAllAssociative());




//$ids = [1, 3, 7];
//$result = $conn->fetchAllAssociative(
//    'SELECT *
//     FROM users
//     WHERE id IN (?)',
//    [$ids], [ArrayParameterType::INTEGER]
//);
//print_array($result);




//try {
//    $conn->beginTransaction();
//
//    $ids = [1, 3, 7];
//    $result = $conn->fetchAllAssociative(
//        'SELECT *
//     FROM users
//     WHERE id IN (?)',
//        [$ids], [ArrayParameterType::INTEGER]
//    );
//    print_array($result);
//
//    $conn->commit();
//} catch (\Throwable) {
//    if ($conn->isTransactionActive()) {
//        $conn->rollBack();
//    }
//}




$conn->transactional(function () use ($conn) {
    $ids = [1, 3, 7];
    $result = $conn->fetchAllAssociative(
        'SELECT *
     FROM users
     WHERE id IN (?)',
        [$ids],
        [ArrayParameterType::INTEGER],
    );
    print_array($result);
});