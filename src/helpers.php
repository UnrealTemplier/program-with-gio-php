<?php

declare(strict_types=1);

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


