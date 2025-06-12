<?php

namespace App;

class InvoiceCollection implements \Iterator
{
    public function __construct(protected array $invoices)
    {
    }

    public function current(): Invoice
    {
        return current($this->invoices);
    }

    public function next(): void
    {
        next($this->invoices);
    }

    public function key(): int
    {
        return key($this->invoices);
    }

    public function valid(): bool
    {
        return current($this->invoices) !== false;
    }

    public function rewind(): void
    {
        reset($this->invoices);
    }
}
