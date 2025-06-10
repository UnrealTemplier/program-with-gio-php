<?php

namespace App;

class Invoice
{
    public int $id = 100;
    public string $number = '0123456789';

    protected int $amount = 100500;

    // this magic method is called
    // when we var_dump the object
    // to print allowed data only
    public function __debugInfo(): ?array
    {
        // we can return nothing through null or empty array
        //return null;
        //return [];

        // or we can return allowed data only
        return [
            'id' => $this->id,
            'number' => '******' . substr($this->number, -4)
        ];
    }
}