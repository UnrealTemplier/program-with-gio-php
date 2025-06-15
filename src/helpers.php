<?php

declare(strict_types=1);

use JetBrains\PhpStorm\NoReturn;

function d(...$objects): void
{
    echo '<pre>';
    var_dump(...$objects);
    echo '</pre>';
}

#[NoReturn]
function dd(...$objects): void
{
    echo '<pre>';
    var_dump(...$objects);
    echo '</pre>';
    die();
}

function print_array(array $array): void
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function print_line(...$values): void
{
    foreach ($values as $value) {
        echo $value . '<br />';
    }
}


