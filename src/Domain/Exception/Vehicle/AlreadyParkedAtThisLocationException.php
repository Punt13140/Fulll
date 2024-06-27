<?php

namespace FleetApp\Domain\Exception\Vehicle;

use Exception;

class AlreadyParkedAtThisLocationException extends Exception
{
    static string $override_message = "The vehicle is already parked at this location";

    public function __construct()
    {
        parent::__construct($this::$override_message);
    }
}