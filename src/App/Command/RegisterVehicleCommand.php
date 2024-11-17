<?php

namespace FleetApp\App\Command;

use FleetApp\Domain\Entity\User;
use FleetApp\Domain\Entity\Vehicle;
use FleetApp\Shared\App\Command\Command;

final readonly class RegisterVehicleCommand implements Command
{
    public function __construct(
        public User    $user,
        public Vehicle $vehicle,
    )
    {
    }
}