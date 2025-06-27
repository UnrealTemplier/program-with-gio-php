<?php

namespace App\Enums;

enum InvoiceStatus: int
{
    case Pending = 0;
    case Paid = 1;
    case Failed = 2;

    public function toString(): string
    {
        return match ($this) {
            InvoiceStatus::Pending => 'Pending',
            InvoiceStatus::Paid => 'Paid',
            InvoiceStatus::Failed => 'Failed',
        };
    }
}