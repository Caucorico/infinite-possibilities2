<?php

namespace App\Entity\Core\Buildings;

use App\Entity\Core\Buildings\Core\Buildings\BuildingInterface;
use App\Entity\Core\Game;
use App\Repository\Core\Buildings\LogicalBuildingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LogicalBuildingRepository::class)
 */
class LogicalBuilding implements BuildingInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $name;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $weight;

    /**
     * @ORM\ManyToOne(targetEntity=Game::class, inversedBy="logicalBuildings")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Game $game;

    /**
     * @ORM\OneToMany(targetEntity=LogicalBuildingProduction::class, mappedBy="logicalBuilding", orphanRemoval=true)
     */
    private $logicalBuildingProductions;

    /**
     * @ORM\OneToMany(targetEntity=LogicalBuildingConsumption::class, mappedBy="logicalBuilding", orphanRemoval=true)
     */
    private $logicalBuildingConsumptions;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxStock;

    /**
     * @ORM\OneToMany(targetEntity=LogicalBuildingStock::class, mappedBy="logicalBuilding", orphanRemoval=true)
     */
    private $logicalBuildingStocks;

    public function __construct()
    {
        $this->logicalBuildingProductions = new ArrayCollection();
        $this->logicalBuildingConsumptions = new ArrayCollection();
        $this->logicalBuildingStocks = new ArrayCollection();
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

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getGame(): ?Game
    {
        return $this->game;
    }

    public function setGame(?Game $game): self
    {
        $this->game = $game;

        return $this;
    }

    /**
     * @return Collection|LogicalBuildingProduction[]
     */
    public function getLogicalBuildingProductions(): Collection
    {
        return $this->logicalBuildingProductions;
    }

    public function addLogicalBuildingProduction(LogicalBuildingProduction $logicalBuildingProduction): self
    {
        if (!$this->logicalBuildingProductions->contains($logicalBuildingProduction)) {
            $this->logicalBuildingProductions[] = $logicalBuildingProduction;
            $logicalBuildingProduction->setLogicalBuilding($this);
        }

        return $this;
    }

    public function removeLogicalBuildingProduction(LogicalBuildingProduction $logicalBuildingProduction): self
    {
        if ($this->logicalBuildingProductions->removeElement($logicalBuildingProduction)) {
            // set the owning side to null (unless already changed)
            if ($logicalBuildingProduction->getLogicalBuilding() === $this) {
                $logicalBuildingProduction->setLogicalBuilding(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|LogicalBuildingConsumption[]
     */
    public function getLogicalBuildingConsumptions(): Collection
    {
        return $this->logicalBuildingConsumptions;
    }

    public function addLogicalBuildingConsumption(LogicalBuildingConsumption $logicalBuildingConsumption): self
    {
        if (!$this->logicalBuildingConsumptions->contains($logicalBuildingConsumption)) {
            $this->logicalBuildingConsumptions[] = $logicalBuildingConsumption;
            $logicalBuildingConsumption->setLogicalBuilding($this);
        }

        return $this;
    }

    public function removeLogicalBuildingConsumption(LogicalBuildingConsumption $logicalBuildingConsumption): self
    {
        if ($this->logicalBuildingConsumptions->removeElement($logicalBuildingConsumption)) {
            // set the owning side to null (unless already changed)
            if ($logicalBuildingConsumption->getLogicalBuilding() === $this) {
                $logicalBuildingConsumption->setLogicalBuilding(null);
            }
        }

        return $this;
    }

    public function getMaxStock(): ?int
    {
        return $this->maxStock;
    }

    public function setMaxStock(int $maxStock): self
    {
        $this->maxStock = $maxStock;

        return $this;
    }

    /**
     * @return Collection|LogicalBuildingStock[]
     */
    public function getLogicalBuildingStocks(): Collection
    {
        return $this->logicalBuildingStocks;
    }

    public function addLogicalBuildingStock(LogicalBuildingStock $logicalBuildingStock): self
    {
        if (!$this->logicalBuildingStocks->contains($logicalBuildingStock)) {
            $this->logicalBuildingStocks[] = $logicalBuildingStock;
            $logicalBuildingStock->setLogicalBuilding($this);
        }

        return $this;
    }

    public function removeLogicalBuildingStock(LogicalBuildingStock $logicalBuildingStock): self
    {
        if ($this->logicalBuildingStocks->removeElement($logicalBuildingStock)) {
            // set the owning side to null (unless already changed)
            if ($logicalBuildingStock->getLogicalBuilding() === $this) {
                $logicalBuildingStock->setLogicalBuilding(null);
            }
        }

        return $this;
    }
}
