<?php

namespace App\Classes;

class Invoice
{
    public function index(): string
    {
        return 'Invoices';
    }

    public function create(): string
    {
        return '<form method="post" action="/invoices/create">Amount: <input type="text" name="amount"></form>';
    }

    public function store(): void
    {
        $amount = $_POST['amount'];
        d($amount);
    }
}