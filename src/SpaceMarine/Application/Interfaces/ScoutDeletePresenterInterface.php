<?php

declare(strict_types=1);

namespace App\SpaceMarine\Application\Interfaces;

use App\SpaceMarine\Application\ModelView\ScoutDeleteModelView;
use App\SpaceMarine\Domain\Entity\ScoutEntity;

interface ScoutDeletePresenterInterface
{
    public function set(ScoutEntity $scoutEntity): void;

    public function present(): ScoutDeleteModelView;
}
