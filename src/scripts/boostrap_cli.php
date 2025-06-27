<?php

declare(strict_types=1);

use App\App;
use Illuminate\Container\Container;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../helpers.php';

return new App(new Container())->boot();
