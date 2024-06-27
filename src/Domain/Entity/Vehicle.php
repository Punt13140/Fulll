<?php

namespace FleetApp\Domain\Entity;

use FleetApp\Domain\Exception\Vehicle\AlreadyParkedAtThisLocationException;

class Vehicle
{
    public string $plate;
    public ?Location $location = null;

    public function __construct(string $plate)
    {
        $this->plate = $plate;
    }

    /**
     * @throws AlreadyParkedAtThisLocationException
     */
    public function park(Location $location): self
    {
        if ($this->location === $location) {
            throw new AlreadyParkedAtThisLocationException();
        }

        $this->location = $location;

        return $this;
    }
}