<?php

namespace App;

use Traversable;

class Collection implements \IteratorAggregate
{
    public function __construct(protected array $items)
    {
    }

    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->items);
    }
}
