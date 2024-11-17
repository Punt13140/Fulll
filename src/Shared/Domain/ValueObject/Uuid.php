<?php

namespace FleetApp\Shared\Domain\ValueObject;

use Stringable;

abstract class Uuid implements Stringable
{
    final public function __construct(protected string $value)
    {
    }

    public static abstract function generate(): self;

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}