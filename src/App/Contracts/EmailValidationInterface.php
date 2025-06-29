<?php

namespace App\Contracts;

use App\Dto\EmailValidationResult;

interface EmailValidationInterface
{
    public function verify(string $email): EmailValidationResult;
}
