<?php

namespace FleetApp\Domain\Entity;

use FleetApp\Domain\Exception\Fleet\VehicleAlreadyRegisteredInFleetException;
use FleetApp\Domain\ValueObject\SimpleUuid;

final class Fleet
{
    private array $vehicles = [];

    public function __construct(private readonly SimpleUuid $uuid)
    {
    }

    public function registerVehicle(Vehicle $vehicle): self
    {
        foreach ($this->vehicles as $existingVehicle) {
            if ($existingVehicle->getPlate() === $vehicle->getPlate()) {
                throw new VehicleAlreadyRegisteredInFleetException($vehicle->getPlate(), $this->getId());
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
        return $this->uuid->getValue();
    }

    public function getVehicles(): array
    {
        return $this->vehicles;
    }
}