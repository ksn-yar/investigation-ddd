<?php

declare(strict_types=1);

namespace App\SpaceMarine\Application\UseCase;

use App\SpaceMarine\Application\Interfaces\ScoutFindAllPresenterInterface;
use App\SpaceMarine\Application\Request\ScoutFindAllRequest;
use App\SpaceMarine\Domain\Interfaces\ScoutRepositoryInterface;

final readonly class ScoutFindAllUseCase
{
    public function __construct(
        private ScoutRepositoryInterface $scoutRepository,
    ) {}

    public function execute(
        ScoutFindAllRequest $findAllRequest,
        ScoutFindAllPresenterInterface $findAllPresenter,
    ): void {
        $findAllPresenter->set(
            $this->scoutRepository->findAllByCriteria(
                $findAllRequest->chapter,
                $findAllRequest->specialization
            ),
        );
    }
}
