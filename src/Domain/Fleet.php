<?php

namespace FleetApp\Domain;

class Fleet
{
    public int $id;
    public array $vehicles = [];

    public function registerVehicle(Vehicle $vehicle): self
    {
        $this->vehicles[] = $vehicle;

        return $this;
    }
}