<?php

namespace App\Models;

use App\Model;

class SignUp extends Model
{
    /**
     * @throws \Throwable
     */
    public function register(array $userInfo, array $invoiceInfo): int
    {
        try {
            $this->db->beginTransaction();

            $userId = new User()->create($userInfo['email'], $userInfo['name']);
            $invoiceId = new Invoice()->create($invoiceInfo['amount'], $userId);

            $this->db->commit();
        } catch (\Throwable $e) {
            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }

            throw $e;
        }

        return $invoiceId;
    }
}
