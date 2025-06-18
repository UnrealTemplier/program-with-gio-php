<?php

declare(strict_types=1);

use App\App;

[$container, $router, $request, $config] = require_once __DIR__ . '/../App/bootstrap.php';

new App($container, $router, $request, $config)->run();
