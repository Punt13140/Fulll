<?php

namespace FleetApp\App\Command;

use FleetApp\Domain\Entity\Vehicle;
use FleetApp\Shared\App\Command\Command;

final readonly class ParkVehicleCommand implements Command
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