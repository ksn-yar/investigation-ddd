<?php

declare(strict_types=1);

namespace App\SpaceMarine\Application\Request;

use DateTimeImmutable;

final readonly class ScoutCreateRequest
{
    public function __construct(
        public string $chapter,
        public string $specialization,
        public string $name,
        public string $surname,
        public DateTimeImmutable $birthDate,
    ) {
    }
}
