<?php

namespace FleetApp\App\Command;

use FleetApp\Domain\Entity\User;
use FleetApp\Domain\Entity\Vehicle;

readonly class RegisterVehicleCommand
{
    public function __construct(
        public User    $user,
        public Vehicle $vehicle,
    )
    {
    }
}