<?php

declare(strict_types=1);

namespace App\Controllers;

use App\App;
use App\Services\InvoiceService;
use App\View;

class HomeController
{
    /**
     * @throws \Throwable
     */
    public function index(): View
    {
        App::$container->get(InvoiceService::class)->process([], 25);

        return View::make('index');
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
