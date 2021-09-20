<?php

namespace App\Entity\Core\Buildings;

use App\Entity\Core\Ressource;
use App\Repository\Core\Buildings\LogicalBuildingProductionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LogicalBuildingProductionRepository::class)
 */
class LogicalBuildingProduction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity=Ressource::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $ressource;

    /**
     * @ORM\ManyToOne(targetEntity=LogicalBuilding::class, inversedBy="logicalBuildingProductions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $logicalBuilding;

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

    public function getLogicalBuilding(): ?LogicalBuilding
    {
        return $this->logicalBuilding;
    }

    public function setLogicalBuilding(?LogicalBuilding $logicalBuilding): self
    {
        $this->logicalBuilding = $logicalBuilding;

        return $this;
    }
}
