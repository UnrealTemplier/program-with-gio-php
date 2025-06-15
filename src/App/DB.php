<?php

namespace App;

use PDO;
use PDOException;

/**
 * @mixin PDO
 */
class DB
{
    private PDO $pdo;

    public function __construct(array $config)
    {
        try {
            $dsn = "{$config['driver']}:host={$config['host']};dbname={$config['database']}";
            $user = $config['user'];
            $pass = $config['pass'];
            $options = [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $this->pdo = new PDO($dsn, $user, $pass, $options);
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

    public function __call(string $name, array $arguments)
    {
        return call_user_func_array([$this->pdo, $name], $arguments);
    }
}
