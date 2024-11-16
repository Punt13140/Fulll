<?php

namespace FleetApp\Domain\Exception\Fleet;

use Exception;
use FleetApp\Domain\Entity\Fleet;
use FleetApp\Domain\Entity\Vehicle;

class VehicleAlreadyRegisteredInFleetException extends Exception
{
    static string $override_message = "The vehicle (plate=%s) is already registered in fleet (id=%d).";

    public function __construct(
        private readonly Vehicle $vehicle,
        private readonly Fleet   $fleet
    )
    {
        parent::__construct(sprintf(self::$override_message, $this->vehicle->getPlate(), $this->fleet->getId()));
    }
}