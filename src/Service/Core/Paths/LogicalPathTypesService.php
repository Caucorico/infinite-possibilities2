<?php


namespace App\Service\Core\Paths;


use Doctrine\ORM\EntityManagerInterface;

class LogicalPathTypesService
{

    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /* TODO : Create specific json export functions */

}