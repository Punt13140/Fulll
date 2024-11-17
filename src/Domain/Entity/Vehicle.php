<?php

namespace FleetApp\Domain\Entity;

use FleetApp\Domain\Exception\Vehicle\AlreadyParkedAtThisLocationException;

final class Vehicle
{
    public ?Location $location = null;

    public function __construct(private string $plate)
    {
    }

    /**
     * @throws AlreadyParkedAtThisLocationException
     */
    public function park(Location $location): self
    {
        if ($this->location === $location) {
            throw new AlreadyParkedAtThisLocationException($this->plate);
        }

        $this->location = $location;
        return $this;
    }

    public function getPlate(): string
    {
        return $this->plate;
    }
}