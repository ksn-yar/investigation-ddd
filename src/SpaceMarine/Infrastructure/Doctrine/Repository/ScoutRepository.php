<?php

declare(strict_types=1);

namespace App\SpaceMarine\Infrastructure\Doctrine\Repository;

use App\SpaceMarine\Infrastructure\Doctrine\Entity\Scout;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Scout>
 *
 * @method null|Scout find($id, $lockMode = null, $lockVersion = null)
 * @method null|Scout findOneBy(array $criteria, array $orderBy = null)
 * @method Scout[]    findAll()
 * @method Scout[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScoutRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Scout::class);
    }
}
