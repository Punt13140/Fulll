<?php

namespace FleetApp\Domain\Exception\Vehicle;

use Exception;
use FleetApp\Domain\Entity\Vehicle;

class AlreadyParkedAtThisLocationException extends Exception
{
    static string $override_message = "The vehicle (plate=%s) is already parked at this location";

    public function __construct(
        private readonly Vehicle $vehicle,
    )
    {
        parent::__construct(sprintf(self::$override_message, $this->vehicle->getPlate()));
    }
}