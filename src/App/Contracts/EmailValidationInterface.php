<?php

namespace App\Contracts;

use App\Services\EmailValidationResult;

interface EmailValidationInterface
{
    public function verify(string $email): EmailValidationResult;
}
