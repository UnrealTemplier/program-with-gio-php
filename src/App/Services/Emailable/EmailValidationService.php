<?php

namespace App\Services\Emailable;

use Exception;

class EmailValidationService
{
    private string $baseUrl = 'https://api.emailable.com/v1/';

    public function __construct(private readonly string $apiKey)
    {
    }

    /**
     * @throws Exception
     */
    public function verify(string $email): array
    {
        $apiParams = [
            'email' => $email,
            'api_key' => $this->apiKey,
        ];

        $api = $this->baseUrl . 'verify?' . http_build_query($apiParams);

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
            return json_decode($content, true);
        }

        return [];
    }
}
