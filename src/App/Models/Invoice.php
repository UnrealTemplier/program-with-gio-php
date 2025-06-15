<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;

class Invoice extends Model
{
    public function create(float $amount, int $userId)
    {
        $stmt = $this->db->prepare(
            'insert into invoices (amount, user_id)
             values (?, ?)'
        );

        $stmt->execute([$amount, $userId]);

        return (int) $this->db->lastInsertId();
    }

    public function find(int $id): mixed
    {
        $stmt = $this->db->prepare(
            'select invoices.id, amount, full_name 
             from invoices 
             inner join users 
             on users.id = invoices.user_id 
             where invoices.id = ?'
        );

        $stmt->execute([$id]);

        return $stmt->fetch();
    }
}
