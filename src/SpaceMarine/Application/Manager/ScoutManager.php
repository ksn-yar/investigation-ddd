<?php

declare(strict_types=1);

namespace App\SpaceMarine\Application\Manager;

use App\SpaceMarine\Application\Exception\EntityNotFoundException;
use App\SpaceMarine\Domain\Entity\ScoutEntity;
use App\SpaceMarine\Domain\Interfaces\ScoutManagerInterface;
use App\SpaceMarine\Infrastructure\Doctrine\Entity\Scout;
use App\SpaceMarine\Infrastructure\Doctrine\Manager\ScoutManager as InfrastructureScoutManager;
use App\SpaceMarine\Infrastructure\Doctrine\Repository\ScoutRepository as InfrastructureScoutRepository;

final readonly class ScoutManager implements ScoutManagerInterface
{
    public function __construct(
        private InfrastructureScoutManager $infrastructureScoutManager,
        private InfrastructureScoutRepository $infrastructureScoutRepository,
    ) {
    }

    public function save(ScoutEntity $scoutEntity): void
    {
        if ($scoutEntity->getId() !== null) {
            $infrastructureScout = $this->infrastructureScoutRepository->find($scoutEntity->getId());

            if ($infrastructureScout === null) {
                throw new EntityNotFoundException();
            }

            $infrastructureScout
                ->setChapter($scoutEntity->getChapter()->getValue()->value)
                ->setName($scoutEntity->getName()->getValue())
                ->setSurname($scoutEntity->getSurname()->getValue())
                ->setSpecialization($scoutEntity->getSpecialization()->getValue()->value)
                ->setBirthDate($scoutEntity->getBirthDate()->getValue())
            ;
        } else {
            $infrastructureScout = (new Scout)
                ->setChapter($scoutEntity->getChapter()->getValue()->value)
                ->setName($scoutEntity->getName()->getValue())
                ->setSurname($scoutEntity->getSurname()->getValue())
                ->setSpecialization($scoutEntity->getSpecialization()->getValue()->value)
                ->setBirthDate($scoutEntity->getBirthDate()->getValue())
            ;
        }

        $this->infrastructureScoutManager->save($infrastructureScout);

        $scoutEntity->setId($infrastructureScout->getId());
    }

    /**
     * @throws EntityNotFoundException
     */
    public function delete(ScoutEntity $scoutEntity): void
    {
        $infrastructureScout = $this->infrastructureScoutRepository->find($scoutEntity->getId());

        if ($infrastructureScout === null) {
            throw new EntityNotFoundException();
        }

        $this->infrastructureScoutManager->delete($infrastructureScout);
    }
}
