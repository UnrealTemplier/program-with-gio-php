<?php

namespace App;

class ClassA
{
    public string $name = 'A';

    public function getName(): string
    {
        return $this->name;
    }
}