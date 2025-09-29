<?php

declare(strict_types=1);

namespace App\SpaceMarine\Infrastructure\Controller;

use App\SpaceMarine\Application\Interfaces\ScoutCreatePresenterInterface;
use App\SpaceMarine\Application\Request\ScoutCreateRequest;
use App\SpaceMarine\Application\UseCase\ScoutCreateUseCase;
use DateMalformedStringException;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/scout/create', name: 'scout_create', methods: ['POST'])]
final class ScoutCreateController extends AbstractController
{
    public function __construct(
        private readonly ScoutCreateUseCase $scoutCreateUseCase,
        private readonly ScoutCreatePresenterInterface $scoutCreatePresenter,
    ) {
    }

    /**
     * @throws DateMalformedStringException
     */
    public function __invoke(Request $request): JsonResponse
    {
        $this->scoutCreateUseCase->execute($this->akaParamConverter($request), $this->scoutCreatePresenter);
        return new JsonResponse($this->scoutCreatePresenter->present());
    }

    /**
     * @throws DateMalformedStringException
     */
    private function akaParamConverter(Request $request): ScoutCreateRequest
    {
        return new ScoutCreateRequest(
            $request->get('chapter'),
            $request->get('specialization'),
            $request->get('name'),
            $request->get('surname'),
            new DateTimeImmutable($request->get('birthDate')),
        );
    }
}
