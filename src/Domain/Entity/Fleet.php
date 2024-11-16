<?php

namespace FleetApp\Domain\Entity;

use FleetApp\Domain\Exception\Fleet\VehicleAlreadyRegisteredInFleetException;

class Fleet
{
    private int $id;
    private array $vehicles = [];

    public function registerVehicle(Vehicle $vehicle): self
    {
        foreach ($this->vehicles as $existingVehicle) {
            if ($existingVehicle->getPlate()->equals($vehicle->getPlate())) {
                throw new VehicleAlreadyRegisteredInFleetException($vehicle, $this);
            }
        }

        $this->vehicles[] = $vehicle;

        return $this;
    }

    public function isVehiculeRegistered(Vehicle $vehicle): bool
    {
        foreach ($this->vehicles as $existingVehicle) {
            if ($existingVehicle->getPlate() === $vehicle->getPlate()) {
                return true;
            }
        }

        return false;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getVehicles(): array
    {
        return $this->vehicles;
    }
}