<?php

declare(strict_types=1);

namespace App\SpaceMarine\Domain\Interfaces;

use App\SpaceMarine\Domain\Entity\ScoutEntity;

interface ScoutRepositoryInterface
{
    /**
     * @param int[] $ids
     *
     * @return ScoutEntity[]
     */
    public function findByIds(array $ids): array;

    public function findOneById(int $id): ?ScoutEntity;

    public function findAllByCriteria(?string $chapter, ?string $specialization): array;
}
