<?php


namespace App\Service\Core;


use App\Entity\Core\Ressource;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManagerInterface;

class ResourceService
{

    private EntityManagerInterface $em;

    /**
     * ResourceService constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    /* TODO : Create specific json export functions */

}