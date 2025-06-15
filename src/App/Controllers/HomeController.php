<?php

declare(strict_types=1);

namespace App\Controllers;

use App\App;
use App\Models\Invoice;
use App\Models\SignUp;
use App\View;

class HomeController
{
    /**
     * @throws \Throwable
     */
    public function index(): View
    {
        $invoiceId = new SignUp()->register(
            [
                'email' => 'rob@halford.com',
                'name' => 'Rob Halford'
            ],
            [
                'amount' => 32
            ]
        );

        return View::make('index', ['invoice' => new Invoice()->find($invoiceId)]);
    }

    public function upload(): void
    {
        $fileData = $_FILES['receipt'];
        $filePath = STORAGE_PATH . '/' . $fileData['name'];
        move_uploaded_file($fileData['tmp_name'], $filePath);

        http_response_code(302);
        header('Location: /');
        exit();
    }
}
