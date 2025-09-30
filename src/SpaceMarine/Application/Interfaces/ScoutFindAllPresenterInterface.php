<?php

declare(strict_types=1);

namespace App\SpaceMarine\Application\Interfaces;

use App\SpaceMarine\Application\ModelView\ScoutFindAllModelView;
use App\SpaceMarine\Domain\Entity\ScoutEntity;

interface ScoutFindAllPresenterInterface
{
    /**
     * @param ScoutEntity[] $scoutEntities
     */
    public function set(array $scoutEntities): void;

    public function present(): ScoutFindAllModelView;
}
