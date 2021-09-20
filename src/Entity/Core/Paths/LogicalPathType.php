<?php

namespace App\Entity\Core\Paths;

use App\Entity\Core\Game;
use App\Repository\Core\Paths\LogicalPathTypeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LogicalPathTypeRepository::class)
 */
class LogicalPathType
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
     * @ORM\ManyToOne(targetEntity=Game::class, inversedBy="logicalPathTypes")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Game $game;

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

    public function getGame(): ?Game
    {
        return $this->game;
    }

    public function setGame(?Game $game): self
    {
        $this->game = $game;

        return $this;
    }
}
