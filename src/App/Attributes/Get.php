<?php

namespace App\Attributes;

use App\RequestMethod;

#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class Get extends Route
{
    public function __construct(string $path)
    {
        parent::__construct($path, RequestMethod::GET);
    }
}