<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;

class User extends Model
{
    public function create(string $email, string $name, bool $isActive = true): int
    {
        $this->db
            ->createQueryBuilder()
            ->insert('users')
            ->values(
                [
                    'email' => '?',
                    'full_name' => '?',
                    'is_active' => '?',
                    'created_at' => 'NOW()',
                    'updated_at' => 'NOW()',
                ],
            )
            ->executeStatement();

        return (int)$this->db->lastInsertId();
    }

    public function find(int $id): mixed
    {
        return $this->db
            ->createQueryBuilder()
            ->select('*')
            ->from('users')
            ->where('id = ?')
            ->setParameter(0, $id)
            ->executeQuery()
            ->fetchOne();
    }
}
