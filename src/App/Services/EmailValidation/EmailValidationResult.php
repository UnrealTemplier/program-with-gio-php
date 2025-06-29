<?php

namespace App\Services\EmailValidation;

readonly class EmailValidationResult
{
    public function __construct(
        public int $score = 0,
        public bool $isDeliverable = false,
    ) {}
}
