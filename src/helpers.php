<?php

declare(strict_types=1);

function printArray(array $array): void
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function printLn(string $string): void
{
    echo $string . '<br />';
}


