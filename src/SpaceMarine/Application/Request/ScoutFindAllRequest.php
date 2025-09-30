<?php

declare(strict_types=1);

namespace App\SpaceMarine\Application\Request;

final readonly class ScoutFindAllRequest
{
    public function __construct(
        public ?string $chapter,
        public ?string $specialization,
    ) {
    }
}
