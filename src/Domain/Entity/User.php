<?php

namespace FleetApp\Domain\Entity;

use FleetApp\Domain\ValueObject\SimpleUuid;

final class User
{
    private ?Fleet $fleet;

    public function __construct(
        private readonly string $email,
    )
    {
        $this->fleet = new Fleet(SimpleUuid::generate());
    }

    public function getFleet(): ?Fleet
    {
        return $this->fleet;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}