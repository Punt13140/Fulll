<?php

namespace FleetApp\Infra;

use FleetApp\Domain\Entity\Fleet;
use FleetApp\Domain\Entity\User;

interface UserRepository
{
    public function save(User $user): void;

    public function findByEmail(string $email): ?Fleet;
}