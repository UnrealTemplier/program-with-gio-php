<?php

namespace App;

use Exception;

/**
 * @property-read float $x
 * @property-write float $y
 * @property float $a
 * @property float $b
 *
 * @method int bar(int $par)
 * @method float baz(string $str)
 */
class Transaction
{
    /** @var Customer $customer */
    public $customer;

    /** @var float $amount */
    public $amount;

    /**
     * Some description
     *
     * @param int $x
     * @param string $str
     *
     * @throws Exception
     *
     * @return bool
     */
    public function process(int $x, string $str): bool
    {
        // process the data
        // if failed then return false
        // otherwise return true

        // e.g. throws an exception
        if ($x != $str) {
            throw new Exception();
        }

        return true;
    }

    /** @var Customer[] $arr */
    public function foo(array $arr): void
    {
        /** @var Customer $obj */
        foreach ($arr as $obj) {
            echo $obj->name;
        }
    }
}