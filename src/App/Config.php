<?php

namespace App;

/**
 * @property-read ?array $db
 * @property-read ?array $mailer
 */
class Config
{
    private array $config;

    public function __construct(array $env)
    {
        $this->config = [
            'db' => [
                'driver' => $env['DB_DRIVER'],
                'host' => $env['DB_HOST'],
                'user' => $env['DB_USER'],
                'pass' => $env['DB_PASS'],
                'database' => $env['DB_NAME'],
            ],
            'mailer' => [
                'dsn' => $env['MAILER_DSN'] ?? '',
            ],
        ];
    }

    public function __get(string $name)
    {
        return $this->config[$name] ?? null;
    }
}
