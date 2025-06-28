<?php

namespace App\Controllers;

use App\Attributes\Get;
use App\Contracts\EmailValidationInterface;

readonly class CurlController
{
    public function __construct(protected EmailValidationInterface $emailValidationService) {}

    #[Get('/curl')]
    public function index(): void
    {
        $email = 'jaimore.evseev@gmail.com';
        $result = $this->emailValidationService->verify($email);

        print_array($result);
    }
}
