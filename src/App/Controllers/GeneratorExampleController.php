<?php

namespace App\Controllers;

use App\Attributes\Get;
use App\Models\Invoice;

readonly class GeneratorExampleController
{
    public function __construct(private Invoice $invoiceModel) {}

    #[Get('/examples/generator')]
    public function index(): void
    {
        $all = $this->invoiceModel->all();

        foreach ($all as $item) {
            print_array($item);
        }
    }
}