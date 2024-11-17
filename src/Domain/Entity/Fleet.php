<?php

namespace FleetApp\Domain\Entity;

use FleetApp\Domain\Exception\Fleet\VehicleAlreadyRegisteredInFleetException;
use FleetApp\Domain\ValueObject\Uuid;

class Fleet
{
    private array $vehicles = [];

    public function __construct(private readonly Uuid $uuid)
    {
    }

    public function registerVehicle(Vehicle $vehicle): self
    {
        foreach ($this->vehicles as $existingVehicle) {
            if ($existingVehicle->getPlate() === $vehicle->getPlate()) {
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

    public function getId(): string
    {
        return $this->uuid->value;
    }

    public function getVehicles(): array
    {
        return $this->vehicles;
    }
}