<?php

namespace FleetApp\App\Command;

use FleetApp\Shared\App\Command\Command;

final readonly class RegisterUserCommand implements Command
{
    public function __construct(
        public string $email,
    )
    {
    }
}