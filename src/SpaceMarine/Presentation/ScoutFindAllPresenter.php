<?php

declare(strict_types=1);

namespace App\SpaceMarine\Presentation;

use App\SpaceMarine\Application\Interfaces\ScoutFindAllPresenterInterface;
use App\SpaceMarine\Application\ModelView\ScoutFindAllModelView;

class ScoutFindAllPresenter implements ScoutFindAllPresenterInterface
{
    private ScoutFindAllModelView $scoutFindAllModelView;

    public function set(array $scoutEntities): void
    {
        $data = [];
        foreach ($scoutEntities as $scoutEntity) {
            $data[] = [
                'id' => $scoutEntity->getId(),
                'chapter' => $scoutEntity->getChapter()->getValue(),
                'name' => $scoutEntity->getName()->getValue(),
                'surname' => $scoutEntity->getSurname()->getValue(),
            ];
        }

        $this->scoutFindAllModelView = new ScoutFindAllModelView($data);
    }

    public function present(): ScoutFindAllModelView
    {
        return $this->scoutFindAllModelView;
    }
}
