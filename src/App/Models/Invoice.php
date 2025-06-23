<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;

class Invoice extends Model
{
    public function create(float $amount, int $userId)
    {
        $this->db
            ->createQueryBuilder()
            ->insert('invoices')
            ->values(
                [
                    'amount' => '?',
                    'user_id' => '?',
                ],
            )
            ->setParameter(0, $amount)
            ->setParameter(1, $userId)
            ->executeStatement();

        return (int)$this->db->lastInsertId();
    }

    public function find(int $id): mixed
    {
        return $this->db
            ->createQueryBuilder()
            ->select('invoices.id', 'amount', 'full_name')
            ->from('invoices', 'i')
            ->join('i', 'users', 'u', 'u.id = i.user_id')
            ->where('i.id = ?')
            ->setParameter(0, $id)
            ->executeQuery()
            ->fetchOne();
    }

    public function all(): \Generator
    {
        $items = $this->db
            ->createQueryBuilder()
            ->select('*')
            ->from('invoices', 'i')
            ->join('i', 'users', 'u')
            ->executeQuery()
            ->iterateAssociative();

        return $this->fetchLazy($items);
    }
}
