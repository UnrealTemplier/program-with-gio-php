<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\EmailStatus;
use App\Model;
use Symfony\Component\Mime\Address;

class Email extends Model
{
    public function queue(
        Address $to,
        Address $from,
        string $subject,
        string $html,
        ?string $text = null,
    ): void {
        $meta['to'] = $to->toString();
        $meta['from'] = $from->toString();

        $this->db
            ->createQueryBuilder()
            ->insert('emails')
            ->values(
                [
                    'subject' => '?',
                    'status' => '?',
                    'html_body' => '?',
                    'text_body' => '?',
                    'meta' => '?',
                    'created_at' => 'NOW()',
                ],
            )
            ->setParameter(0, $subject)
            ->setParameter(1, EmailStatus::Queue->value)
            ->setParameter(2, $html)
            ->setParameter(3, $text)
            ->setParameter(4, json_encode($meta))
            ->executeStatement();
    }

    public function getEmailsByStatus(EmailStatus $status): array
    {
        return $this->db
            ->createQueryBuilder()
            ->select('*')
            ->from('emails')
            ->where('status = ?')
            ->setParameter(0, $status->value)
            ->fetchAllAssociative();
    }

    public function markEmailSent(int $id): void
    {
        $this->db
            ->createQueryBuilder()
            ->update('emails')
            ->set('status', '?')
            ->set('sent_at', 'NOW()')
            ->where('id = ?')
            ->setParameter(0, EmailStatus::Sent->value)
            ->setParameter(1, $id)
            ->executeStatement();
    }

    public function markEmailFailed(int $id): void
    {
        $this->db
            ->createQueryBuilder()
            ->update('emails')
            ->set('status', '?')
            ->set('sent_at', 'NOW()')
            ->where('id = ?')
            ->setParameter(0, EmailStatus::Failed->value)
            ->setParameter(1, $id)
            ->executeStatement();
    }
}