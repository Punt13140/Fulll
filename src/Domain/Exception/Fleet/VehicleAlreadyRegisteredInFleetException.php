<?php

namespace FleetApp\Domain\Exception\Fleet;

use FleetApp\Shared\Domain\Exception\DomainException;

class VehicleAlreadyRegisteredInFleetException extends DomainException
{
    static string $override_message = "The vehicle (plate=%s) is already registered in fleet (id=%s).";

    public function __construct(
        private readonly string $vehiclePlate,
        private readonly string $fleetUuid,
    )
    {
        parent::__construct(sprintf(self::$override_message, $this->vehiclePlate, $this->fleetUuid));
    }
}