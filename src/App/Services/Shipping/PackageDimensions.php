<?php

namespace App\Services\Shipping;

use InvalidArgumentException;

readonly class PackageDimensions
{
    public function __construct(public float $width, public float $height, public float $length)
    {
        match (true) {
            $width <= 0 || $width > 100 => throw new InvalidArgumentException('Invalid width'),
            $height <= 0 || $height > 100 => throw new InvalidArgumentException('Invalid height'),
            $length <= 0 || $length > 100 => throw new InvalidArgumentException('Invalid length'),
            default => true
        };
    }

    public function increaseWidth(float $width): self
    {
        return new self($this->width + $width, $this->height, $this->length);
    }

    public function equals(PackageDimensions $other): bool
    {
        return $this->width === $other->width
            && $this->height === $other->height
            && $this->length === $other->length;
    }
}
