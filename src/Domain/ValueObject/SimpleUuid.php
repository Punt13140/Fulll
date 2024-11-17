<?php

namespace FleetApp\Domain\ValueObject;

use FleetApp\Shared\Domain\ValueObject\Uuid;

final class SimpleUuid extends Uuid
{
    public static function generate(): self
    {
        // J'ai perdu trop de temps à réfléchir à qui/quoi doit générer l'UUID
        return new self(uniqid("", true));
    }

    public function isValid(string $value): void
    {
        // TODO: Implement isValid() method.
    }
}