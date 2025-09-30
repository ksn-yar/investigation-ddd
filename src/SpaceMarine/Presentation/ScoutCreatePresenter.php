<?php

declare(strict_types=1);

namespace App\SpaceMarine\Presentation;

use App\SpaceMarine\Application\Interfaces\ScoutCreatePresenterInterface;
use App\SpaceMarine\Application\ModelView\ScoutCreateModelView;
use App\SpaceMarine\Domain\Entity\ScoutEntity;

class ScoutCreatePresenter implements ScoutCreatePresenterInterface
{
    private ScoutCreateModelView $scoutCreateModelView;

    public function set(ScoutEntity $scoutEntity): void
    {
        $this->scoutCreateModelView = new ScoutCreateModelView(
            $scoutEntity->getId(),
            \sprintf('%s %s', $scoutEntity->getName(), $scoutEntity->getSurname()),
        );
    }

    public function present(): ScoutCreateModelView
    {
        return $this->scoutCreateModelView;
    }
}
