<?php

declare(strict_types=1);

namespace App\SpaceMarine\Application\Interfaces;

use App\SpaceMarine\Application\ModelView\ScoutCreateModelView;
use App\SpaceMarine\Domain\Entity\ScoutEntity;

interface ScoutCreatePresenterInterface
{
    public function set(ScoutEntity $scoutEntity): void;

    public function present(): ScoutCreateModelView;
}
