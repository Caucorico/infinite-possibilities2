<?php

namespace App\Repository\Core;

use App\Entity\Core\RegionRessources;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RegionRessources|null find($id, $lockMode = null, $lockVersion = null)
 * @method RegionRessources|null findOneBy(array $criteria, array $orderBy = null)
 * @method RegionRessources[]    findAll()
 * @method RegionRessources[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RegionRessourcesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RegionRessources::class);
    }
}
