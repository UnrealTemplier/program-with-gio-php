<?php

declare(strict_types=1);

require_once './../vendor/autoload.php';
require_once './../helpers.php';

set_exception_handler(function (\Throwable $throwable) {
    print_line($throwable->getMessage());
});

$a = 10 / 0;