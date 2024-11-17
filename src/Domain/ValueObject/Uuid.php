<?php

namespace FleetApp\Domain\ValueObject;

final readonly class Uuid
{
    public function __construct(
        public string $value
    )
    {
    }

    public static function generate(): self
    {
        // J'ai perdu trop de temps à réfléchir à qui/quoi doit générer l'UUID
        return new self(uniqid("", true));
    }
}