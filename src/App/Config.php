<?php

declare(strict_types=1);

namespace App;

/**
 * @property-read ?array $db
 * @property-read ?array $mailer
 * @property-read ?array $apiKeys
 */
class Config
{
    private array $config;

    public function __construct(array $env)
    {
        $this->config = [
            'db' => [
                'driver' => $env['DB_DRIVER'] ?? 'mysql',
                'host' => $env['DB_HOST'],
                'username' => $env['DB_USER'],
                'password' => $env['DB_PASS'],
                'database' => $env['DB_NAME'],
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => '',
            ],
            'mailer' => [
                'dsn' => $env['MAILER_DSN'] ?? '',
            ],
            'apiKeys' => [
                'emailable' => $env['EMAIL_VERIFICATION_EMAILABLE']
            ]
        ];
    }

    public function __get(string $name)
    {
        return $this->config[$name] ?? null;
    }
}
