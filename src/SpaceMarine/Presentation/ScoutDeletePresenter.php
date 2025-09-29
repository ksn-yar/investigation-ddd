<?php

declare(strict_types=1);

namespace App\SpaceMarine\Presentation;

use App\SpaceMarine\Application\Interfaces\ScoutDeletePresenterInterface;
use App\SpaceMarine\Application\ModelView\ScoutDeleteModelView;
use App\SpaceMarine\Domain\Entity\ScoutEntity;

class ScoutDeletePresenter implements ScoutDeletePresenterInterface
{
    private ScoutDeleteModelView $scoutDeleteModelView;

    public function set(ScoutEntity $scoutEntity): void
    {
        $this->scoutDeleteModelView = new ScoutDeleteModelView(
            $scoutEntity->getId(),
        );
    }

    public function present(): ScoutDeleteModelView
    {
        return $this->scoutDeleteModelView;
    }
}
