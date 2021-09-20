<?php

namespace App\Entity\Core;

use App\Entity\Core\Paths\LogicalPath;
use App\Repository\Core\LogicalRegionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LogicalRegionRepository::class)
 */
class LogicalRegion implements RegionInterface
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
    private ?int $x;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $y;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $depth;

    /**
     * @ORM\ManyToOne(targetEntity=LogicalMap::class, inversedBy="logicalRegions")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?LogicalMap $map;

    /**
     * @ORM\ManyToOne(targetEntity=LogicalRegion::class)
     */
    private ?self $parent;

    /**
     * @ORM\OneToMany(targetEntity=RegionRessources::class, mappedBy="ManyToOne", orphanRemoval=true)
     */
    private ?Collection $regionRessources;

    /**
     * @ORM\ManyToOne(targetEntity=LogicalBiome::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private ?LogicalBiome $biome;

    /**
     * @ORM\OneToMany(targetEntity=LogicalPath::class, mappedBy="start", orphanRemoval=true)
     */
    private ?Collection $startPaths;

    /**
     * @ORM\OneToMany(targetEntity=LogicalPath::class, mappedBy="destination", orphanRemoval=true)
     */
    private ?Collection $arrivedPaths;

    public function __construct()
    {
        $this->regionRessources = new ArrayCollection();
        $this->startPaths = new ArrayCollection();
        $this->arrivedPaths = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getX(): ?int
    {
        return $this->x;
    }

    public function setX(int $x): self
    {
        $this->x = $x;

        return $this;
    }

    public function getY(): ?int
    {
        return $this->y;
    }

    public function setY(int $y): self
    {
        $this->y = $y;

        return $this;
    }

    public function getDepth(): ?int
    {
        return $this->depth;
    }

    public function setDepth(int $depth): self
    {
        $this->depth = $depth;

        return $this;
    }

    public function getMap(): ?LogicalMap
    {
        return $this->map;
    }

    public function setMap(?LogicalMap $map): self
    {
        $this->map = $map;

        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection|RegionRessources[]
     */
    public function getRegionRessources(): Collection
    {
        return $this->regionRessources;
    }

    public function addRegionRessource(RegionRessources $regionRessource): self
    {
        if (!$this->regionRessources->contains($regionRessource)) {
            $this->regionRessources[] = $regionRessource;
            $regionRessource->setLogicalRegion($this);
        }

        return $this;
    }

    public function removeRegionRessource(RegionRessources $regionRessource): self
    {
        if ($this->regionRessources->removeElement($regionRessource)) {
            // set the owning side to null (unless already changed)
            if ($regionRessource->getLogicalRegion() === $this) {
                $regionRessource->setLogicalRegion(null);
            }
        }

        return $this;
    }

    public function getBiome(): ?LogicalBiome
    {
        return $this->biome;
    }

    public function setBiome(?LogicalBiome $biome): self
    {
        $this->biome = $biome;

        return $this;
    }

    /**
     * @return Collection|LogicalPath[]
     */
    public function getStartPaths(): Collection
    {
        return $this->startPaths;
    }

    public function addStartPath(LogicalPath $startPath): self
    {
        if (!$this->startPaths->contains($startPath)) {
            $this->startPaths[] = $startPath;
            $startPath->setStart($this);
        }

        return $this;
    }

    public function removeStartPath(LogicalPath $startPath): self
    {
        if ($this->startPaths->removeElement($startPath)) {
            // set the owning side to null (unless already changed)
            if ($startPath->getStart() === $this) {
                $startPath->setStart(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|LogicalPath[]
     */
    public function getArrivedPaths(): Collection
    {
        return $this->arrivedPaths;
    }

    public function addArrivedPath(LogicalPath $arrivedPath): self
    {
        if (!$this->arrivedPaths->contains($arrivedPath)) {
            $this->arrivedPaths[] = $arrivedPath;
            $arrivedPath->setDestination($this);
        }

        return $this;
    }

    public function removeArrivedPath(LogicalPath $arrivedPath): self
    {
        if ($this->arrivedPaths->removeElement($arrivedPath)) {
            // set the owning side to null (unless already changed)
            if ($arrivedPath->getDestination() === $this) {
                $arrivedPath->setDestination(null);
            }
        }

        return $this;
    }
}
