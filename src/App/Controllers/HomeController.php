<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use PDO;
use PDOException;

class HomeController
{
    public function index(): View
    {
        try {
            $db = new PDO('mysql:host=mysql;dbname=my_db', 'root', 'root', [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            print_line(
                'PDOException: ' . $e->getMessage(),
                'Error code: ' . $e->getCode(),
                'In file: ' . $e->getFile(),
                'At line: ' . $e->getLine(),
                '',
            );
        }

        try {
            $db->beginTransaction();

            $email = 'j@doe.com';
            $name = 'J Doe';
            $isActive = 1;
            $createdAt = date('Y-m-d H:i:s', time());
            $updatedAt = date('Y-m-d H:i:s', time());

            $amount = 25;

            $newUserStmt = $db->prepare(
                'insert into users (email, full_name, is_active, created_at, updated_at) 
                 values (?, ?, ?, ?, ?)');

            $newInvoiceStmt = $db->prepare(
                'insert into invoices (amount, user_id)
                 values (?, ?)'
            );

            $newUserStmt->execute([$email, $name, $isActive, $createdAt, $updatedAt]);

            $userId = $db->lastInsertId();

            $newInvoiceStmt->execute([$amount, $userId]);
            
            $db->commit();
        } catch (\Throwable $e) {
            if ($db->inTransaction()) {
                $db->rollBack();
            }

            throw $e;
        }

        $query = 'select * from users where id = ?';
        $stmt = $db->prepare($query);
        $stmt->execute([$userId]);
        print_array($stmt->fetchAll());

        return View::make('index');
    }

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
