<?php

namespace App\Entity\Core;

use App\Entity\Core\Buildings\LogicalBuilding;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GameRepository::class)
 */
class Game
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Ressource::class)
     */
    private $ressources;

    /**
     * @ORM\OneToMany(targetEntity=LogicalBuilding::class, mappedBy="game", orphanRemoval=true)
     */
    private $logicalBuildings;

    public function __construct()
    {
        $this->ressources = new ArrayCollection();
        $this->logicalBuildings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Ressource[]
     */
    public function getRessources(): Collection
    {
        return $this->ressources;
    }

    public function addRessource(Ressource $ressource): self
    {
        if (!$this->ressources->contains($ressource)) {
            $this->ressources[] = $ressource;
        }

        return $this;
    }

    public function removeRessource(Ressource $ressource): self
    {
        $this->ressources->removeElement($ressource);

        return $this;
    }

    /**
     * @return Collection|LogicalBuilding[]
     */
    public function getLogicalBuildings(): Collection
    {
        return $this->logicalBuildings;
    }

    public function addLogicalBuilding(LogicalBuilding $logicalBuilding): self
    {
        if (!$this->logicalBuildings->contains($logicalBuilding)) {
            $this->logicalBuildings[] = $logicalBuilding;
            $logicalBuilding->setGame($this);
        }

        return $this;
    }

    public function removeLogicalBuilding(LogicalBuilding $logicalBuilding): self
    {
        if ($this->logicalBuildings->removeElement($logicalBuilding)) {
            // set the owning side to null (unless already changed)
            if ($logicalBuilding->getGame() === $this) {
                $logicalBuilding->setGame(null);
            }
        }

        return $this;
    }
}
