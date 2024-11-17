<?php

namespace FleetApp\Infra;

use FleetApp\Domain\Entity\Fleet;

interface FleetRepository
{
    public function save(Fleet $fleet): void;

    public function findById(int $fleetId): ?Fleet;
}