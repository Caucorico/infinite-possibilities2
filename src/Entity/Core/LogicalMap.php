<?php

namespace App\Entity\Core;

use App\Repository\Core\LogicalMapRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LogicalMapRepository::class)
 */
class LogicalMap implements MapInterface
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
    private ?int $sizeX;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $sizeY;

    /**
     * @ORM\OneToOne(targetEntity=GameMatch::class, inversedBy="logicalMap", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private ?GameMatch $gameMatch;

    /**
     * @ORM\OneToMany(targetEntity=LogicalRegion::class, mappedBy="map", orphanRemoval=true)
     */
    private ?Collection $logicalRegions;

    public function __construct()
    {
        $this->logicalRegions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSizeX(): ?int
    {
        return $this->sizeX;
    }

    public function setSizeX(int $sizeX): self
    {
        $this->sizeX = $sizeX;

        return $this;
    }

    public function getSizeY(): ?int
    {
        return $this->sizeY;
    }

    public function setSizeY(int $sizeY): self
    {
        $this->sizeY = $sizeY;

        return $this;
    }

    public function getGameMatch(): ?GameMatch
    {
        return $this->gameMatch;
    }

    public function setGameMatch(GameMatch $gameMatch): self
    {
        $this->gameMatch = $gameMatch;

        return $this;
    }

    /**
     * @return Collection|LogicalRegion[]
     */
    public function getLogicalRegions(): Collection
    {
        return $this->logicalRegions;
    }

    public function addLogicalRegion(LogicalRegion $logicalRegion): self
    {
        if (!$this->logicalRegions->contains($logicalRegion)) {
            $this->logicalRegions[] = $logicalRegion;
            $logicalRegion->setMap($this);
        }

        return $this;
    }

    public function removeLogicalRegion(LogicalRegion $logicalRegion): self
    {
        if ($this->logicalRegions->removeElement($logicalRegion)) {
            // set the owning side to null (unless already changed)
            if ($logicalRegion->getMap() === $this) {
                $logicalRegion->setMap(null);
            }
        }

        return $this;
    }
}
