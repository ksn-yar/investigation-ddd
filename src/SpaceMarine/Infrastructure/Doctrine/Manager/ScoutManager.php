<?php

declare(strict_types=1);

namespace App\SpaceMarine\Infrastructure\Doctrine\Manager;

use App\SpaceMarine\Infrastructure\Doctrine\Entity\Scout;

class ScoutManager extends AbstractManager
{
    public function save(Scout $scout): void
    {
        $this->entityManager->persist($scout);
        $this->entityManager->flush();
    }

    public function delete(Scout $scout): void
    {
        $this->entityManager->remove($scout);
        $this->entityManager->flush();
    }
}
