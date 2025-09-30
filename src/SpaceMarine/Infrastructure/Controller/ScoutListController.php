<?php

declare(strict_types=1);

namespace App\SpaceMarine\Infrastructure\Controller;

use App\SpaceMarine\Application\Interfaces\ScoutFindAllPresenterInterface;
use App\SpaceMarine\Application\Request\ScoutFindAllRequest;
use App\SpaceMarine\Application\UseCase\ScoutFindAllUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/scout/all', name: 'scout_all', methods: ['GET'])]
final class ScoutListController extends AbstractController
{
    public function __construct(
        private readonly ScoutFindAllUseCase $scoutFindAllUseCase,
        private readonly ScoutFindAllPresenterInterface $scoutFindAllPresenter,
    )
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $this->scoutFindAllUseCase->execute(
            $this->akaParamConverter($request),
            $this->scoutFindAllPresenter,
        );

        return new JsonResponse($this->scoutFindAllPresenter->present());
    }

    private function akaParamConverter(Request $request): ScoutFindAllRequest
    {
        return new ScoutFindAllRequest($request->get('chapter'), $request->get('specialization'));
    }
}
