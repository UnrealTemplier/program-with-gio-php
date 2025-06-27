<?php

namespace App\Controllers;

use App\Attributes\Get;
use Exception;

class CurlController
{
    #[Get('/curl')]
    public function index(): void
    {
        $apiParams = [
            'email' => 'jaimore.evseev@gmail.com',
            'api_key' => 'test_6d8a9b27a6742a06ce84',
        ];

        $api = 'https://api.emailable.com/v1/verify?' . http_build_query($apiParams);

        $curlOptions = [
            CURLOPT_URL => $api,
            CURLOPT_RETURNTRANSFER => true,
        ];

        $handle = curl_init();
        curl_setopt_array($handle, $curlOptions);
        $content = curl_exec($handle);

        if ($error = curl_error($handle)) {
            throw new Exception($error);
        }

        if ($content !== false) {
            $content = json_decode($content, true);
            print_array($content);
        }
    }
}