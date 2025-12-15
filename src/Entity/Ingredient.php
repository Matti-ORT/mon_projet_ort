<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\IngredientRepository::class)]
class Ingredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $nom;

    #[ORM\OneToMany(mappedBy: 'ingredient', targetEntity: IngredientRecette::class, orphanRemoval: true, cascade: ['persist'])]
    private Collection $ingredientRecettes;

    public function __construct()
    {
        $this->ingredientRecettes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /** @return Collection|IngredientRecette[] */
    public function getIngredientRecettes(): Collection
    {
        return $this->ingredientRecettes;
    }

    public function addIngredientRecette(IngredientRecette $ir): self
    {
        if (! $this->ingredientRecettes->contains($ir)) {
            $this->ingredientRecettes->add($ir);
            $ir->setIngredient($this);
        }

        return $this;
    }

    public function removeIngredientRecette(IngredientRecette $ir): self
    {
        if ($this->ingredientRecettes->removeElement($ir)) {
            if ($ir->getIngredient() === $this) {
                $ir->setIngredient(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->nom ?? '';
    }
}
