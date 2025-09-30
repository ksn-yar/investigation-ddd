<?php

declare(strict_types=1);

namespace App\SpaceMarine\Application\Repository;

use App\SpaceMarine\Domain\Entity\ScoutEntity;
use App\SpaceMarine\Domain\Interfaces\ScoutRepositoryInterface;
use App\SpaceMarine\Infrastructure\Doctrine\Repository\ScoutRepository as InfrastructureScoutRepository;

final readonly class ScoutRepository implements ScoutRepositoryInterface
{
    public function __construct(
        private InfrastructureScoutRepository $infrastructureScoutRepository,
    ) {}

    public function findByIds(array $ids): array
    {
        // todo не уверен в правильности маппинга данных в этом месте
        $result = [];
        foreach ($this->infrastructureScoutRepository->findBy(['id' => $ids]) as $infrastructureScout) {
            $result[] = ScoutEntity::create(
                id: $infrastructureScout->getId(),
                chapter: $infrastructureScout->getChapter(),
                specialization: $infrastructureScout->getSpecialization(),
                name: $infrastructureScout->getName(),
                surname: $infrastructureScout->getSurname(),
                birthDate: $infrastructureScout->getBirthDate(),
            );
        }

        return $result;
    }

    public function findOneById(int $id): ?ScoutEntity
    {
        // todo не уверен в правильности маппинга данных в этом месте
        $infrastructureScout = $this->infrastructureScoutRepository->find($id);
        if (null === $infrastructureScout) {
            return null;
        }

        return ScoutEntity::create(
            id: $infrastructureScout->getId(),
            chapter: $infrastructureScout->getChapter(),
            specialization: $infrastructureScout->getSpecialization(),
            name: $infrastructureScout->getName(),
            surname: $infrastructureScout->getSurname(),
            birthDate: $infrastructureScout->getBirthDate(),
        );
    }

    public function findAllByCriteria(?string $chapter, ?string $specialization): array
    {
        $criteria = [];
        if ($chapter) {
            $criteria['chapter'] = $chapter;
        }
        if ($specialization) {
            $criteria['specialization'] = $specialization;
        }

        $result = [];

        // todo не уверен в правильности маппинга данных в этом месте
        $infrastructureScouts = $this->infrastructureScoutRepository->findBy($criteria);
        foreach ($infrastructureScouts as $infrastructureScout) {
            $result[] = ScoutEntity::create(
                id: $infrastructureScout->getId(),
                chapter: $infrastructureScout->getChapter(),
                specialization: $infrastructureScout->getSpecialization(),
                name: $infrastructureScout->getName(),
                surname: $infrastructureScout->getSurname(),
                birthDate: $infrastructureScout->getBirthDate(),
            );
        }

        return $result;
    }
}
