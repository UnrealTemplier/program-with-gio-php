<?php

declare(strict_types=1);

namespace App;

class ToasterPro extends Toaster
{
    protected int $size;

    public function __construct(string $additionalParameter)
    {
        parent::__construct();

        $this->size = 4;
    }

    public function toastBagel(): void
    {
        foreach ($this->slices as $i => $slice) {
            print_line(($i + 1) . ': Toasting with bagels option' . $slice);
        }
    }
}