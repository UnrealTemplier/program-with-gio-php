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

function formatDate(string $date, string $format = 'M j, Y'): string
{
    return date($format, strtotime($date));
}

function formatDollarAmount(float $amount): string
{
    $isNegative = $amount < 0;
    return ($isNegative ? '-' : '') . '$' . number_format(abs($amount), 2);
}

function amountColor(float $amount): string
{
    if ($amount > 0) {
        return 'green';
    }

    if ($amount < 0) {
        return 'red';
    }

    return 'black';
}

function view(string $viewPath, array $params = []): mixed
{
    extract($params);
    return require VIEWS_PATH . $viewPath;
}
