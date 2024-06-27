<?php

namespace FleetApp\Domain;

class Vehicle
{
    public string $plate;
    public ?Location $location = null;

    public function __construct(string $plate)
    {
        $this->plate = $plate;
    }

    public function park(Location $location): self
    {
        $this->location = $location;

        return $this;
    }
}