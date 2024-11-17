<?php

namespace FleetApp\App\Command;

use FleetApp\Domain\Entity\Vehicle;

readonly class ParkVehicleCommand
{
    public function __construct(
        public Vehicle $vehicle,
        public float   $latitude,
        public float   $longitude,
        public ?float  $altitude = null,
    )
    {
    }
}