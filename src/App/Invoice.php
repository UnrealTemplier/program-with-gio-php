<?php

namespace App;

class Invoice
{
    protected function process(int $amount, string $description): void
    {
        print_line('amount: ' . $amount);
        print_line('description: ' . $description);
    }

    // we can call hidden or just any methods indirectly,
    // but it can break encapsulation
    // though it's a way to hide something behind facade and defer the call
    public function __call(string $name, array $arguments)
    {
        print_line($name . ' method was called.');
        print_line('Its arguments:');
        echo '<pre>';
        print_r($arguments);
        echo '</pre>';

        print_line('Now we\'ll call it indirectly...');
        print_line();

        call_user_func_array([$this, $name], $arguments);
    }
}