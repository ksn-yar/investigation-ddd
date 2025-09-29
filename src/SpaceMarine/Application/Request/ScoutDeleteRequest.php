<?php

declare(strict_types=1);

namespace App\SpaceMarine\Application\Request;

final readonly class ScoutDeleteRequest
{
    public function __construct(
        public int $id,
    ) {
    }
}
