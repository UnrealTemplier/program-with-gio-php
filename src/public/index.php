<?php

declare(strict_types=1);

use App\App;

[$router, $request, $config] = require_once __DIR__ . '/../App/bootstrap.php';

new App($router, $request, $config)->run();
