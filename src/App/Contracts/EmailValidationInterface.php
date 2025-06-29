<?php

namespace App\Contracts;

use App\Services\EmailValidation\EmailValidationResult;

interface EmailValidationInterface
{
    public function verify(string $email): EmailValidationResult;
}
