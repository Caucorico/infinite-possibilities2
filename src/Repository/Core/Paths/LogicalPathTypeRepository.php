<?php

namespace App\Repository\Core\Paths;

use App\Entity\Core\Paths\LogicalPathType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LogicalPathType|null find($id, $lockMode = null, $lockVersion = null)
 * @method LogicalPathType|null findOneBy(array $criteria, array $orderBy = null)
 * @method LogicalPathType[]    findAll()
 * @method LogicalPathType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogicalPathTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LogicalPathType::class);
    }

    // /**
    //  * @return LogicalPathType[] Returns an array of LogicalPathType objects
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
    public function findOneBySomeField($value): ?LogicalPathType
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
