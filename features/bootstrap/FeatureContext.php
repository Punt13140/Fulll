<?php

use Behat\Behat\Context\Context;
use Behat\Step\Given;
use Behat\Step\Then;
use Behat\Step\When;
use FleetApp\Domain\Entity\Fleet;
use FleetApp\Domain\Entity\Location;
use FleetApp\Domain\Entity\Vehicle;
use FleetApp\Domain\Exception\Fleet\VehicleAlreadyRegisteredInFleetException;
use FleetApp\Domain\Exception\Vehicle\AlreadyParkedAtThisLocationException;
use PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private Fleet $fleet;
    private Vehicle $vehicle;
    private Location $location;
    private ?string $exceptionMessage = null;

    public function __construct()
    {
    }

    /* <-- Background park_vehicle --> */

    #[Given('my fleet')]
    public function myFleet(): void
    {
        $this->fleet = new Fleet(0);
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

    /* -- -- */

    /* <-- Scenario: Successfully park a vehicle --> */

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

    /* -- -- */

    /* <-- Scenario: Can't localize my vehicle to the same location two times in a row --> */

    #[Given('my vehicle has been parked into this location')]
    public function myVehicleHasBeenParkedIntoThisLocation(): void
    {
        $this->vehicle->park($this->location);
    }

    #[When('I try to park my vehicle at this location')]
    public function iTryToParkMyVehicleAtThisLocation(): void
    {
        try {
            $this->vehicle->park($this->location);
        } catch (Exception $exception) {
            $this->exceptionMessage = $exception->getMessage();
        }
    }

    #[Then('I should be informed that my vehicle is already parked at this location')]
    public function iShouldBeInformedThatMyVehicleIsAlreadyParkedAtThisLocation(): void
    {
        Assert::assertNotNull(
            $this->exceptionMessage,
            "I was not informed at all that my vehicle is already parked at this location",
        );

        Assert::assertEquals(
            sprintf(AlreadyParkedAtThisLocationException::$override_message, $this->vehicle->getPlate()),
            $this->exceptionMessage,
            "I was informed that something went wrong, but not that my vehicle is already parked at this location",
        );
    }

    /* -- -- */

    /* <-- Scenario: I can register a vehicle --> */

    #[When('I register this vehicle into my fleet')]
    public function iRegisterThisVehicleIntoMyFleet(): void
    {
        $this->fleet->registerVehicle($this->vehicle);
    }

    #[Then('this vehicle should be part of my vehicle fleet')]
    public function thisVehicleShouldBePartOfMyVehicleFleet(): void
    {
        Assert::assertTrue(
            $this->fleet->isVehiculeRegistered($this->vehicle),
            "The vehicle is not part of the fleet"
        );
    }

    /* -- -- */

    /* <-- Scenario: I can't register same vehicle twice --> */

    #[When('I try to register this vehicle into my fleet')]
    public function iTryToRegisterThisVehicleIntoMyFleet(): void
    {
        try {
            $this->fleet->registerVehicle($this->vehicle);
        } catch (Exception $exception) {
            $this->exceptionMessage = $exception->getMessage();
        }
    }

    #[Then('I should be informed this this vehicle has already been registered into my fleet')]
    public function iShouldBeInformedThisThisVehicleHasAlreadyBeenRegisteredIntoMyFleet(): void
    {
        Assert::assertNotNull(
            $this->exceptionMessage,
            "I was not informed at all that my vehicle has already been registered into my fleet",
        );

        Assert::assertEquals(
            sprintf(VehicleAlreadyRegisteredInFleetException::$override_message, $this->vehicle->getPlate(), $this->fleet->getId()),
            $this->exceptionMessage,
            "I was informed that something went wrong, but not that my vehicle has already been registered into my fleet",
        );
    }

    /* -- -- */

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
