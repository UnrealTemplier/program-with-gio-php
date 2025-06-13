<?php

namespace App\Classes;

class Invoice
{
    public function index(): string
    {
        setcookie('user_name', 'Sergio', time() + 120);

        $_SESSION['user_password'] = '1234';

        return 'Invoices';
    }

    public function create(): string
    {
        unset($_SESSION['user_password']);

        setcookie('user_name', '', time() - 3600, '/');
        unset($_COOKIE['user_name']);

        return '<form method="post" action="/invoices/create">Amount: <input type="text" name="amount"></form>';
    }

    public function store(): void
    {
        $amount = $_POST['amount'];
        d($amount);
    }
}