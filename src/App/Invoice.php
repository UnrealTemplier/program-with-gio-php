<?php

namespace App;

class Invoice
{
    public function __call(string $name, array $arguments)
    {
        print_line($name . ' method was called.');
        print_line('Its arguments:');
        echo '<pre>';
        print_r($arguments);
        echo '</pre>';
    }

    public static function __callStatic(string $name, array $arguments)
    {
        print_line($name . ' method was called statically.');
        print_line('Its arguments:');
        echo '<pre>';
        print_r($arguments);
        echo '</pre>';
    }
}