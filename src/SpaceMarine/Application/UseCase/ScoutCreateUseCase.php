<?php

declare(strict_types=1);

namespace App\SpaceMarine\Application\UseCase;

use App\SpaceMarine\Application\Interfaces\ScoutCreatePresenterInterface;
use App\SpaceMarine\Application\Request\ScoutCreateRequest;
use App\SpaceMarine\Domain\Entity\ScoutEntity;
use App\SpaceMarine\Domain\Interfaces\ScoutManagerInterface;

final readonly class ScoutCreateUseCase
{
    public function __construct(
        private ScoutManagerInterface $scoutManager,
    ) {}

    public function execute(
        ScoutCreateRequest $request,
        ScoutCreatePresenterInterface $scoutCreatePresenter,
    ): void {
        $scoutEntity = ScoutEntity::create(
            id: null,
            chapter: $request->chapter,
            specialization: $request->specialization,
            name: $request->name,
            surname: $request->surname,
            birthDate: $request->birthDate,
        );

        $scoutEntity
            ->setScoutManager($this->scoutManager)
            ->save()
        ;

        $scoutCreatePresenter->set($scoutEntity);
    }
}
