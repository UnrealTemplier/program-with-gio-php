<?php

declare(strict_types=1);

namespace App;

class Toaster
{
    protected array $slices;
    protected int $size;

    public function __construct()
    {
        $this->slices = [];
        $this->size = 2;
    }

    final public function addSlice(string $slice): void
    {
        if (count($this->slices) < $this->size) {
            $this->slices[] = $slice;
        }
    }

    public function toast(): void
    {
        foreach ($this->slices as $i => $slice) {
            print_line(($i + 1) . ': Toasting ' . $slice);
        }
    }
}