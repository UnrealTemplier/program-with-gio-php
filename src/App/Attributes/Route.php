<?php

namespace App\Attributes;

use App\Enums\RequestMethod;

#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
abstract class Route
{
    public function __construct(
        public string $path,
        public RequestMethod $method,
    ) {}
}