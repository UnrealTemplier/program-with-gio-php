<?php

namespace App\Controllers;

use App\Models\Invoice;
use Generator;

class GeneratorExampleController
{
    public function __construct(private Invoice $invoiceModel) {}

    public function index(): void
    {
        $all = $this->invoiceModel->all();

        foreach ($all as $item) {
            print_array($item);
        }
    }
}