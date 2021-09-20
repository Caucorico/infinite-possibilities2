<?php

namespace App\Repository\Core\Buildings;

use App\Entity\Core\Buildings\LogicalBuildingStock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LogicalBuildingStock|null find($id, $lockMode = null, $lockVersion = null)
 * @method LogicalBuildingStock|null findOneBy(array $criteria, array $orderBy = null)
 * @method LogicalBuildingStock[]    findAll()
 * @method LogicalBuildingStock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogicalBuildingStockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LogicalBuildingStock::class);
    }

    // /**
    //  * @return LogicalBuildingStock[] Returns an array of LogicalBuildingStock objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LogicalBuildingStock
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
