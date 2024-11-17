<?php

namespace FleetApp\Domain\Exception\Vehicle;

use FleetApp\Shared\Domain\Exception\DomainException;

class AlreadyParkedAtThisLocationException extends DomainException
{
    static string $override_message = "The vehicle (plate=%s) is already parked at this location";

    public function __construct(
        private readonly string $vehiclePlate,
    )
    {
        parent::__construct(sprintf(self::$override_message, $this->vehiclePlate));
    }
}