<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;

class HomeController
{
    public function index(): View
    {
        return View::make('index', ['boo' => 'booze']);
    }

    public function upload(): void
    {
        $fileData = $_FILES['receipt'];
        $filePath = STORAGE_PATH . '/' . $fileData['name'];
        move_uploaded_file($fileData['tmp_name'], $filePath);

        print_array(pathinfo($filePath));
    }
}