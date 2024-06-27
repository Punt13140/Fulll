<?php

use Behat\Behat\Context\Context;
use Behat\Step\Given;
use Behat\Step\Then;
use Behat\Step\When;
use FleetApp\Domain\Fleet;
use FleetApp\Domain\Location;
use FleetApp\Domain\Vehicle;
use PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private Fleet $fleet;
    private Vehicle $vehicle;
    private Location $location;

    public function __construct()
    {
    }

    #[Given('my fleet')]
    public function myFleet(): void
    {
        $this->fleet = new Fleet();
    }

    #[Given('a vehicle')]
    public function aVehicle(): void
    {
        $this->vehicle = new Vehicle("test");
    }

    #[Given('I have registered this vehicle into my fleet')]
    public function iHaveRegisteredThisVehicleIntoMyFleet(): void
    {
        $this->fleet->registerVehicle($this->vehicle);
    }

    #[Given('a location')]
    public function aLocation(): void
    {
        $this->location = new Location(0.0, 0.0);
    }

    #[When('I park my vehicle at this location')]
    public function iParkMyVehicleAtThisLocation(): void
    {
        $this->vehicle->park($this->location);
    }

    #[Then('the known location of my vehicle should verify this location')]
    public function theKnownLocationOfMyVehicleShouldVerifyThisLocation(): void
    {
        Assert::assertEquals($this->location, $this->vehicle->location, "The vehicle is not parked at the expected location");
    }
//
//    #[Given('my vehicle has been parked into this location')]
//    public function myVehicleHasBeenParkedIntoThisLocation()
//    {
//        throw new PendingException();
//    }
//
//    #[When('I try to park my vehicle at this location')]
//    public function iTryToParkMyVehicleAtThisLocation()
//    {
//        throw new PendingException();
//    }
//
//    #[Then('I should be informed that my vehicle is already parked at this location')]
//    public function iShouldBeInformedThatMyVehicleIsAlreadyParkedAtThisLocation()
//    {
//        throw new PendingException();
//    }
//
//    #[When('I register this vehicle into my fleet')]
//    public function iRegisterThisVehicleIntoMyFleet()
//    {
//        throw new PendingException();
//    }
//
//    #[Then('this vehicle should be part of my vehicle fleet')]
//    public function thisVehicleShouldBePartOfMyVehicleFleet()
//    {
//        throw new PendingException();
//    }
//
//    #[When('I try to register this vehicle into my fleet')]
//    public function iTryToRegisterThisVehicleIntoMyFleet()
//    {
//        throw new PendingException();
//    }
//
//    #[Then('I should be informed this this vehicle has already been registered into my fleet')]
//    public function iShouldBeInformedThisThisVehicleHasAlreadyBeenRegisteredIntoMyFleet()
//    {
//        throw new PendingException();
//    }
//
//    #[Given('the fleet of another user')]
//    public function theFleetOfAnotherUser()
//    {
//        throw new PendingException();
//    }
//
//    #[Given('this vehicle has been registered into the other user\'s fleet')]
//    public function thisVehicleHasBeenRegisteredIntoTheOtherUsersFleet()
//    {
//        throw new PendingException();
//    }

}
