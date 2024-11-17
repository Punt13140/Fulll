<?php

namespace FleetApp\Domain\Entity;

use FleetApp\Domain\ValueObject\Uuid;

class User
{
    private ?Fleet $fleet;

    public function __construct(
        private readonly string $email,
    )
    {
        $this->fleet = new Fleet(Uuid::generate());
    }

    public function getFleet(): ?Fleet
    {
        return $this->fleet;
    }
}