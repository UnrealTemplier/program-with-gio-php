<?php

declare(strict_types=1);

function getTransactionFiles(string $dirPath): array
{
    $files = [];

    foreach ((scandir($dirPath)) as $file) {
        if (is_dir($file)) {
            continue;
        }

        $files[] = $dirPath . $file;
    }

    return $files;
}

function parseTransaction(array $transaction): array
{
    [$date, $checkNumber, $description, $amount] = $transaction;

    $amount = (float)str_replace(['$', ','], '', $amount);

    return [
        'date' => $date,
        'checkNumber' => $checkNumber,
        'description' => $description,
        'amount' => $amount,
    ];
}

function getTransactionsFromFile(string $filename): array
{
    $transactions = [];

    if (!file_exists($filename)) {
        trigger_error("File {$filename} does not exists.", E_USER_ERROR);
    }

    $file = fopen($filename, 'r');

    fgetcsv($file);

    while (($transaction = fgetcsv($file)) !== false) {
        $transactions[] = parseTransaction($transaction);
    }

    return $transactions;
}

function getAllTransactions(string $dirPath, bool $asOneArray = true): array
{
    $filenames = getTransactionFiles($dirPath);

    $transactions = [];

    foreach ($filenames as $filename) {
        if ($asOneArray) {
            $transactions = [...$transactions, ...getTransactionsFromFile($filename)];
        } else {
            $transactions[] = getTransactionsFromFile($filename);
        }
    }

    return $transactions;
}

function calculateTotals(array $transactions): array
{
    $totals = ['netTotal' => 0, 'totalIncome' => 0, 'totalExpense' => 0];

    foreach ($transactions as $transaction) {
        $amount = $transaction['amount'];

        $totals['netTotal'] += $amount;

        if ($amount >= 0) {
            $totals['totalIncome'] += $amount;
        } else {
            $totals['totalExpense'] += $amount;
        }
    }

    return $totals;
}
