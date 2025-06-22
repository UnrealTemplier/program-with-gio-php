<?php

declare(strict_types=1);

use App\App;
use App\Container;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../helpers.php';

return new App(new Container())->boot();
