<?php

declare(strict_types=1);

namespace App\SpaceMarine\Application\ModelView;

final readonly class ScoutFindAllModelView
{
    public function __construct(
        // todo заменить на коллекцию классов, для первой демонстрации сойдет и так
        private array $data,
    ) {
    }
}
