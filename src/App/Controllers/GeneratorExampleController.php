<?php

namespace App\Controllers;

use Generator;

class GeneratorExampleController
{
    public function index(): void
    {
        $range = $this->lazyRange(1, 10_000_000);

        foreach ($range as $i) {
            print_line($i);
        }
    }

    private function lazyRange(int $start, int $end): Generator
    {
        for ($i = $start; $i <= $end; $i++) {
            yield $i;
        }
    }
}