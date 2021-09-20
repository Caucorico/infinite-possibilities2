<?php

namespace App\Entity\Core\Paths;

use App\Entity\Core\LogicalRegion;
use App\Repository\Core\Paths\LogicalPathRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LogicalPathRepository::class)
 */
class LogicalPath
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\ManyToOne(targetEntity=LogicalRegion::class, inversedBy="startPaths")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?LogicalRegion $start;

    /**
     * @ORM\ManyToOne(targetEntity=LogicalRegion::class, inversedBy="arrivedPaths")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?LogicalRegion $destination;

    /**
     * @ORM\ManyToMany(targetEntity=LogicalRegion::class)
     */
    private ?Collection $regions;

    public function __construct()
    {
        $this->regions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStart(): ?LogicalRegion
    {
        return $this->start;
    }

    public function setStart(?LogicalRegion $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getDestination(): ?LogicalRegion
    {
        return $this->destination;
    }

    public function setDestination(?LogicalRegion $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * @return Collection|LogicalRegion[]
     */
    public function getRegions(): Collection
    {
        return $this->regions;
    }

    public function addRegion(LogicalRegion $region): self
    {
        if (!$this->regions->contains($region)) {
            $this->regions[] = $region;
        }

        return $this;
    }

    public function removeRegion(LogicalRegion $region): self
    {
        $this->regions->removeElement($region);

        return $this;
    }
}
