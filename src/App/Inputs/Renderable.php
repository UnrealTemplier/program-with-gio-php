<?php

namespace App\Inputs;

interface Renderable
{
    public function render(): string;
}