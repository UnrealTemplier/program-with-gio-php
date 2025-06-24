<?php

namespace App\Enums;

enum InvoiceStatus: int
{
    case Pending = 0;
    case Paid = 1;
    case Failed = 2;
}