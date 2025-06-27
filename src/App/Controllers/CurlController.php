<?php

namespace App\Controllers;

use App\Attributes\Get;
use App\Services\Emailable\EmailValidationService;

readonly class CurlController
{
    public function __construct(protected EmailValidationService $emailValidationService) {}

    #[Get('/curl')]
    public function index(): void
    {
        $email = 'jaimore.evseev@gmail.com';
        $result = $this->emailValidationService->verify($email);

        print_array($result);
    }
}
