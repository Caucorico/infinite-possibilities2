<?php

namespace App\Entity\Core;

use App\Repository\Core\RegionRessourcesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RegionRessourcesRepository::class)
 */
class RegionRessources
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $quantity;

    /**
     * @ORM\ManyToOne(targetEntity=Ressource::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Ressource $ressource;

    /**
     * @ORM\ManyToOne(targetEntity=LogicalRegion::class, inversedBy="regionRessources")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?LogicalRegion $logicalRegion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getRessource(): ?Ressource
    {
        return $this->ressource;
    }

    public function setRessource(?Ressource $ressource): self
    {
        $this->ressource = $ressource;

        return $this;
    }

    public function getLogicalRegion(): ?LogicalRegion
    {
        return $this->logicalRegion;
    }

    public function setLogicalRegion(?LogicalRegion $logicalRegion): self
    {
        $this->logicalRegion = $logicalRegion;

        return $this;
    }
}
