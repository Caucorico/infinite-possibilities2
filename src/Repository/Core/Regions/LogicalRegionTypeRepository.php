<?php

namespace App\Repository\Core\Regions;

use App\Entity\Core\Regions\LogicalRegionType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LogicalRegionType|null find($id, $lockMode = null, $lockVersion = null)
 * @method LogicalRegionType|null findOneBy(array $criteria, array $orderBy = null)
 * @method LogicalRegionType[]    findAll()
 * @method LogicalRegionType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogicalRegionTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LogicalRegionType::class);
    }
}
