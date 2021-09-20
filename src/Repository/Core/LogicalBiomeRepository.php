<?php

namespace App\Repository\Core;

use App\Entity\Core\LogicalBiome;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LogicalBiome|null find($id, $lockMode = null, $lockVersion = null)
 * @method LogicalBiome|null findOneBy(array $criteria, array $orderBy = null)
 * @method LogicalBiome[]    findAll()
 * @method LogicalBiome[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogicalBiomeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LogicalBiome::class);
    }
}
