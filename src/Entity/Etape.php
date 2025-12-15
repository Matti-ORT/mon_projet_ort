<?php

namespace App\Entity;

use App\Repository\EtapeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtapeRepository::class)]
class Etape
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    private string $order;
    private string $description;
    private ?string $photo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrder(): string
    {
        return $this->order;
    }

    public function setOrder(string $order): self
    {
        $this->order = $order;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
