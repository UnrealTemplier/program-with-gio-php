<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Attributes\Get;
use App\Attributes\Post;
use App\View;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class UserController
{
    public function __construct(protected MailerInterface $mailer) {}

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

        $email = new Email()
            ->from('support@supernatural.com')
            ->to($email)
            ->subject('Welcome!')
            ->text($text)
            ->html($html)
            ->attach('Hello Attachment!', 'welcome.txt');

        $this->mailer->send($email);
    }
}