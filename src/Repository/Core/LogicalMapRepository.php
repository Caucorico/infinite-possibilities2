<?php

namespace App\Repository\Core;

use App\Entity\Core\LogicalMap;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LogicalMap|null find($id, $lockMode = null, $lockVersion = null)
 * @method LogicalMap|null findOneBy(array $criteria, array $orderBy = null)
 * @method LogicalMap[]    findAll()
 * @method LogicalMap[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogicalMapRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LogicalMap::class);
    }
}
