<?php

namespace App\Inputs;

abstract class Field implements Renderable
{
    public function __construct(public string $name) {}
}