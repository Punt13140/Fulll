<?php

namespace FleetApp\App\Handler;

use FleetApp\App\Command\RegisterUserCommand;
use FleetApp\Domain\Entity\User;
use FleetApp\Infra\UserRepository;
use FleetApp\Shared\App\Handler\CommandHandler;

final readonly class RegisterUserHandler implements CommandHandler
{
    public function __construct(
        private UserRepository $userRepository,
    )
    {
    }

    public function handle(RegisterUserCommand $command): void
    {
        $user = new User($command->email);

        $this->userRepository->save($user);
    }
}