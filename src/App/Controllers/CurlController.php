<?php

namespace App\Controllers;

use App\Attributes\Get;
use PHPUnit\Framework\Exception;

class CurlController
{
    #[Get('/curl')]
    public function index(): void
    {
        // some valid URL
        $url = 'https://www.example.com';

        // some invalid URL for error test
        //$url = 'https://www.shit.com';

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $content = curl_exec($handle);

        if ($error = curl_error($handle)) {
            throw new Exception('URL: ' . $url . '. Some shit happened!');
        }

        echo $content;
    }
}