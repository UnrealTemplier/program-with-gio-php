<?php

declare(strict_types=1);

use App\App;
use App\Services\EmailService;

/** @var App $app */
$app = require_once __DIR__ . '/boostrap_cli.php';
$app->boot();

/** @var EmailService $emailService */
$emailService = $app->getContainer()->get(EmailService::class);
$emailService->sendQueuedEmails();