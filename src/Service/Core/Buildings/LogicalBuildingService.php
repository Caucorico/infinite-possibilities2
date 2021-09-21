<?php


namespace App\Service\Core\Buildings;


use Doctrine\ORM\EntityManagerInterface;

class LogicalBuildingService
{

    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /* TODO : Create specific json export functions */

}