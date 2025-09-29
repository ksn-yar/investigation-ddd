<?php

declare(strict_types=1);

namespace App\SpaceMarine\Application\UseCase;

use App\SpaceMarine\Application\Exception\EntityNotFoundException;
use App\SpaceMarine\Application\Interfaces\ScoutDeletePresenterInterface;
use App\SpaceMarine\Application\ModelView\ScoutDeleteModelView;
use App\SpaceMarine\Application\Request\ScoutDeleteRequest;
use App\SpaceMarine\Domain\Interfaces\ScoutManagerInterface;
use App\SpaceMarine\Domain\Interfaces\ScoutRepositoryInterface;

final readonly class ScoutDeleteUseCase
{
    public function __construct(
        private ScoutManagerInterface $scoutManager,
        private ScoutRepositoryInterface $scoutRepository,
    ) {
    }

    /**
     * @throws EntityNotFoundException
     */
    public function execute(
        ScoutDeleteRequest $request,
        ScoutDeletePresenterInterface $scoutDeletePresenter,
    ): void {
        $scoutEntity = $this->scoutRepository->findOneById($request->id);

        if ($scoutEntity === null) {
            throw new EntityNotFoundException();
        }

        $scoutEntity
            ->setScoutManager($this->scoutManager)
            ->delete()
        ;

        $scoutDeletePresenter->set($scoutEntity);
    }
}
