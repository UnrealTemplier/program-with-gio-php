<?php

declare(strict_types=1);

use JetBrains\PhpStorm\NoReturn;

function d(mixed $object): void
{
    echo '<pre>';
    var_dump($object);
    echo '</pre>';
}

#[NoReturn]
function dd(mixed $object): void
{
    echo '<pre>';
    var_dump($object);
    echo '</pre>';
    die();
}

function print_array(array $array): void
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function print_line(mixed $value = ''): void
{
    echo $value . '<br />';
}


