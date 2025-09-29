<?php

declare(strict_types=1);

namespace App\SpaceMarine\Infrastructure\Controller;

use App\SpaceMarine\Application\Exception\EntityNotFoundException;
use App\SpaceMarine\Application\Request\ScoutDeleteRequest;
use App\SpaceMarine\Application\UseCase\ScoutDeleteUseCase;
use App\SpaceMarine\Presentation\ScoutDeletePresenter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/scout/delete/{id}', name: 'scout_delete', methods: ['DELETE'])]
final class ScoutDeleteController extends AbstractController
{
    public function __construct(
        private readonly ScoutDeleteUseCase $scoutDeleteUseCase,
        private readonly ScoutDeletePresenter $scoutDeletePresenter,
    ) {
    }

    /**
     * @throws EntityNotFoundException
     */
    public function __invoke(Request $request): JsonResponse
    {
        $this->scoutDeleteUseCase->execute($this->akaParamConverter($request), $this->scoutDeletePresenter);
        return new JsonResponse($this->scoutDeletePresenter->present());
    }

    private function akaParamConverter(Request $request): ScoutDeleteRequest
    {
        return new ScoutDeleteRequest((int) $request->get('id'));
    }
}
