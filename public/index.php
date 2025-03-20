<?php

declare(strict_types = 1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

require_once APP_PATH . 'helpers.php';
require_once APP_PATH . 'App.php';

$transactions = getAllTransactions(FILES_PATH);
$totals = calculateTotals($transactions);

view('transactions.php', [
    'transactions' => $transactions,
    'totals' => $totals,
]);
