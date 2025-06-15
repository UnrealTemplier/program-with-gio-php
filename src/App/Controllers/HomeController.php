<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use JetBrains\PhpStorm\NoReturn;
use PDO;
use PDOException;

class HomeController
{
    public function index(): View
    {
        try {
            $db = new PDO('mysql:host=mysql;dbname=my_db', 'root', 'root', [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);

            $email = $_GET['email'];
            $name = $_GET['name'];
            $isActive = 1;
            $createdAt = date('Y-m-d H:i:s', strtotime('2025-05-15 11:38:00'));
            $query = 'insert into users (email, full_name, is_active, created_at) 
                      values (:email, :name, :isActive, :createdAt)';

            $stmt = $db->prepare($query);
            $stmt->bindValue('email', $email);
            $stmt->bindValue('name', $name);
            $stmt->bindParam('isActive', $isActive);
            $stmt->bindParam('createdAt', $createdAt);
            $stmt->execute();

            $id = $db->lastInsertId();
            print_array($db->query('select * from users where id = ' . $id)->fetchAll());
        } catch (PDOException $e) {
            print_line(
                'PDOException: ' . $e->getMessage(),
                'Error code: ' . $e->getCode(),
                'In file: ' . $e->getFile(),
                'At line: ' . $e->getLine(),
                '',
            );
        }

        return View::make('index');
    }

    #[NoReturn]
    public function upload(): void
    {
        $fileData = $_FILES['receipt'];
        $filePath = STORAGE_PATH . '/' . $fileData['name'];
        move_uploaded_file($fileData['tmp_name'], $filePath);

        http_response_code(302);
        header('Location: /');
        exit();
    }
}