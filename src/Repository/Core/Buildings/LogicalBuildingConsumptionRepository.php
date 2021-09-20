<?php

namespace App\Repository\Core\Buildings;

use App\Entity\Core\Buildings\LogicalBuildingConsumption;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LogicalBuildingConsumption|null find($id, $lockMode = null, $lockVersion = null)
 * @method LogicalBuildingConsumption|null findOneBy(array $criteria, array $orderBy = null)
 * @method LogicalBuildingConsumption[]    findAll()
 * @method LogicalBuildingConsumption[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogicalBuildingConsumptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LogicalBuildingConsumption::class);
    }

    // /**
    //  * @return LogicalBuildingConsumption[] Returns an array of LogicalBuildingConsumption objects
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
    public function findOneBySomeField($value): ?LogicalBuildingConsumption
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
