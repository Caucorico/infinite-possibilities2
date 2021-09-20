<?php

namespace App\Repository\Core\Buildings;

use App\Entity\Core\Buildings\LogicalBuilding;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LogicalBuilding|null find($id, $lockMode = null, $lockVersion = null)
 * @method LogicalBuilding|null findOneBy(array $criteria, array $orderBy = null)
 * @method LogicalBuilding[]    findAll()
 * @method LogicalBuilding[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogicalBuildingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LogicalBuilding::class);
    }
}
