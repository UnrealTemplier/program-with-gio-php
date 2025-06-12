<?php

namespace App;

class InvoiceCollection implements \Iterator
{
    protected int $key = 0;

    public function __construct(protected array $invoices)
    {
    }

    public function current(): Invoice
    {
        return $this->invoices[$this->key];
    }

    public function next(): void
    {
        ++$this->key;
    }

    public function key(): int
    {
        return $this->key;
    }

    public function valid(): bool
    {
        return isset($this->invoices[$this->key]);
    }

    public function rewind(): void
    {
        $this->key = 0;
    }
}
