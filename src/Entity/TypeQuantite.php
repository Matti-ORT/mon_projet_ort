<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\TypeQuantiteRepository::class)]
class TypeQuantite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $libelle;

    #[ORM\Column(type: 'string', length: 100)]
    private string $code;

    #[ORM\OneToMany(mappedBy: 'typeQuantite', targetEntity: IngredientRecette::class, orphanRemoval: true)]
    private Collection $ingredientRecettes;

    public function __construct()
    {
        $this->ingredientRecettes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /** @return Collection|IngredientRecette[] */
    public function getIngredientRecettes(): Collection
    {
        return $this->ingredientRecettes;
    }
}
