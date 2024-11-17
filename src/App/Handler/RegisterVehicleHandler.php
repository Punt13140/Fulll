<?php

namespace FleetApp\App\Handler;

use FleetApp\App\Command\RegisterVehicleCommand;
use FleetApp\Infra\FleetRepository;
use FleetApp\Shared\App\Handler\CommandHandler;

final readonly class RegisterVehicleHandler implements CommandHandler
{
    public function __construct(
        private readonly FleetRepository $fleetRepository,
    )
    {
    }

    public function handle(RegisterVehicleCommand $command): void
    {
        $fleet = $command->user->getFleet();
        $vehicle = $command->vehicle;

        $fleet->registerVehicle($vehicle);

        $this->fleetRepository->save($fleet);
    }
}