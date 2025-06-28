<?php

namespace App\Services\Emailable;

use App\Contracts\EmailValidationInterface;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class EmailValidationService implements EmailValidationInterface
{
    private string $baseUrl = 'https://api.emailable.com/v1/';

    public function __construct(private readonly string $apiKey) {}

    /**
     * @throws Exception
     */
    public function verify(string $email): array
    {
        $stack = HandlerStack::create();
        $stack->push($this->getRetryMiddleware(3));

        $client = new Client([
            'base_uri' => $this->baseUrl,
            'timeout' => 5,
            'handler' => $stack,
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
            echo 'Client error, code: ' . $e->getCode()
                . ', in file: ' . $e->getFile()
                . ', at line: ' . $e->getLine() . PHP_EOL;
        }

        return [];
    }

    private function getRetryMiddleware(int $maxRetries): callable
    {
        return Middleware::retry(function (
            int $retries,
            RequestInterface $request,
            ?ResponseInterface $response = null,
            ?\RuntimeException $e = null,
        ) use ($maxRetries) {
            if ($retries >= $maxRetries) {
                return false;
            }

            if ($response && in_array($response->getStatusCode(), [249, 429, 503, 404])) {
                return true;
            }

            if ($e instanceof ConnectException) {
                return true;
            }

            return false;
        });
    }
}
