<?php

namespace FleetApp\Infra;

use FleetApp\Domain\Entity\Vehicle;

interface VehicleRepository
{
    public function save(Vehicle $vehicle): void;

    public function findByPlate(string $plate): ?Vehicle;
}