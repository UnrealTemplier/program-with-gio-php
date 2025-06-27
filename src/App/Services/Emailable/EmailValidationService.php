<?php

namespace App\Services\Emailable;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class EmailValidationService
{
    private string $baseUrl = 'https://api.emailable.com/v1/';

    public function __construct(private readonly string $apiKey) {}

    /**
     * @throws Exception
     */
    public function verify(string $email): array
    {
        $client = new Client([
            'base_uri' => $this->baseUrl,
            'timeout' => 5,
        ]);

        $apiQueryParams = [
            'email' => $email,
            'api_key' => $this->apiKey,
        ];

        try {
            $response = $client->get('verify', ['query' => $apiQueryParams]);
            return json_decode($response->getBody()->getContents(), true);
        }
        catch (GuzzleException $e) {
            echo $e->getMessage()
                . ', in file: ' . $e->getFile()
                . ', at line: ' . $e->getLine() . PHP_EOL;
        }

        return [];
    }
}
