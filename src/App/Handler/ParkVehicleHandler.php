<?php

namespace FleetApp\App\Handler;

use FleetApp\App\Command\ParkVehicleCommand;
use FleetApp\Domain\Entity\Location;
use FleetApp\Infra\VehicleRepository;

readonly class ParkVehicleHandler
{
    public function __construct(
        private VehicleRepository $vehicleRepository,
    )
    {
    }

    public function handle(ParkVehicleCommand $command): void
    {
        $location = new Location(
            $command->latitude,
            $command->longitude,
            $command->altitude
        );

        $vehicle = $command->vehicle;

        $vehicle->park($location);

        $this->vehicleRepository->save($vehicle);
    }
}