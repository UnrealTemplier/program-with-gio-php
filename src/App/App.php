<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\RouteNotFoundException;
use PDO;
use PDOException;

class App
{
    private static PDO $db;

    public function __construct(
        protected Router $router,
        protected array  $request,
        protected array  $config)
    {
        try {
            $dsn = "{$config['db']['driver']}:host={$config['db']['host']};dbname={$config['db']['database']}";
            $user = $config['db']['user'];
            $pass = $config['db']['pass'];
            $options = [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            static::$db = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            print_line(
                'PDOException: ' . $e->getMessage(),
                'Error code: ' . $e->getCode(),
                'In file: ' . $e->getFile(),
                'At line: ' . $e->getLine(),
                '',
            );
        }
    }

    public function run(): void
    {
        try {
            echo $this->router->resolve(
                $this->request['uri'],
                $this->request['method']
            );
        } catch (RouteNotFoundException) {
            http_response_code(404);

            echo View::make('errors/404');
        }
    }

    public static function db(): PDO
    {
        return static::$db;
    }
}
