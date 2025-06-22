<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Attributes\Get;
use App\Attributes\Post;
use App\Models\Email;
use App\View;
use Symfony\Component\Mime\Address;

class UserController
{
    #[Get('/users/create')]
    public function create(): View
    {
        return View::make('users/register');
    }

    #[Post('/users/register')]
    public function register(): void
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $firstName = explode(' ', $name)[0];

        $text = (string)View::make('mail/plainText', ['firstName' => $firstName]);
        $html = (string)View::make('mail/htmlText', ['firstName' => $firstName]);

        new Email()->queue(
            new Address($email),
            new Address('support@supernatural.com', 'Support'),
            'Welcome',
            $html,
            $text,
        );
    }
}