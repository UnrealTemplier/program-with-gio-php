<?php

declare(strict_types=1);

function print_array(array $array): void
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function println(string $string): void
{
    echo $string . '<br />';
}

function view(string $viewPath): mixed
{
    return require VIEWS_PATH . $viewPath;
}

function getTransactionFiles(string $path): array
{
    $files = [];

    foreach ((scandir($path)) as $file) {
        if (is_dir($file)) {
            continue;
        }

        $files[] = $path . $file;
    }

    return $files;
}

function getTransactionsFromFile(string $filename): array
{
    $transactions = [];

    if (!file_exists($filename)) {
        trigger_error("File {$filename} doesn not exists.", E_USER_ERROR);
    }

    $file = fopen($filename, 'r');

    fgetcsv($file);

    while (($transaction = fgetcsv($file)) !== false) {
        $transactions[] = $transaction;
    }

    return $transactions;
}

function getAllTransactions(string $path): array
{
    $filenames = getTransactionFiles($path);

    if (empty($filenames)) {
        return [];
    }

    $transactions = [];

    foreach ($filenames as $filename) {
        $transactions = [...$transactions, ...getTransactionsFromFile($filename)];
    }

    return $transactions;
}