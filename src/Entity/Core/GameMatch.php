<?php

namespace App\Entity\Core;

use App\Repository\Core\GameMatchRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GameMatchRepository::class)
 */
class GameMatch
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\OneToOne(targetEntity=LogicalMap::class, mappedBy="gameMatch", cascade={"persist", "remove"})
     */
    private ?LogicalMap $logicalMap;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogicalMap(): ?LogicalMap
    {
        return $this->logicalMap;
    }

    public function setLogicalMap(LogicalMap $logicalMap): self
    {
        // set the owning side of the relation if necessary
        if ($logicalMap->getGameMatch() !== $this) {
            $logicalMap->setGameMatch($this);
        }

        $this->logicalMap = $logicalMap;

        return $this;
    }
}
