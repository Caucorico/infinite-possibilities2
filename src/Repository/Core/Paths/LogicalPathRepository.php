<?php

namespace App\Repository\Core\Paths;

use App\Entity\Core\Paths\LogicalPath;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LogicalPath|null find($id, $lockMode = null, $lockVersion = null)
 * @method LogicalPath|null findOneBy(array $criteria, array $orderBy = null)
 * @method LogicalPath[]    findAll()
 * @method LogicalPath[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogicalPathRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LogicalPath::class);
    }

    // /**
    //  * @return LogicalPath[] Returns an array of LogicalPath objects
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
    public function findOneBySomeField($value): ?LogicalPath
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
