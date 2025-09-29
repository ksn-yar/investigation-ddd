<?php

declare(strict_types=1);

namespace App\SpaceMarine\Application\ModelView;

final readonly class ScoutDeleteModelView
{
    public function __construct(
        public int $id,
    ) {
    }
}
