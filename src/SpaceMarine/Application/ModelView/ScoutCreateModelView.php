<?php

declare(strict_types=1);

namespace App\SpaceMarine\Application\ModelView;

final readonly class ScoutCreateModelView
{
    public function __construct(
        public int $id,
        public string $fullName,
    ) {
    }
}
