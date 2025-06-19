<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\InvoiceService;
use App\View;
use App\Attributes\Get;
use App\Attributes\Post;
use Throwable;

readonly class HomeController
{
    public function __construct(private InvoiceService $invoiceService) {}

    /**
     * @throws Throwable
     */
    #[Get('/')]
    public function index(): View
    {
        $this->invoiceService->process([], 25);

        return View::make('index');
    }

    #[Post('/upload')]
    public function upload(): never
    {
        $fileData = $_FILES['receipt'];
        $filePath = STORAGE_PATH . '/' . $fileData['name'];
        move_uploaded_file($fileData['tmp_name'], $filePath);

        http_response_code(302);
        header('Location: /');
        exit();
    }
}
