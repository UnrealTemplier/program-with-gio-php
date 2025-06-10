<?php

namespace App;

class Invoice
{
    public function __invoke(): void
    {
        print_line('Invoked');
    }
}