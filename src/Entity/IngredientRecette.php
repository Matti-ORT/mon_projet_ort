<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\IngredientRecetteRepository::class)]
class IngredientRecette
{
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column(type: 'integer')]
	private ?int $id = null;

	#[ORM\ManyToOne(targetEntity: Recette::class, inversedBy: 'ingredientRecettes')]
	#[ORM\JoinColumn(nullable: false)]
	private ?Recette $recette = null;

	#[ORM\ManyToOne(targetEntity: Ingredient::class, inversedBy: 'ingredientRecettes')]
	#[ORM\JoinColumn(nullable: false)]
	private ?Ingredient $ingredient = null;

	#[ORM\Column(type: 'float')]
	private float $quantite = 0;

	#[ORM\ManyToOne(targetEntity: TypeQuantite::class, inversedBy: 'ingredientRecettes')]
	#[ORM\JoinColumn(nullable: true)]
	private ?TypeQuantite $typeQuantite = null;

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getRecette(): ?Recette
	{
		return $this->recette;
	}

	public function setRecette(?Recette $recette): self
	{
		$this->recette = $recette;

		return $this;
	}

	public function getIngredient(): ?Ingredient
	{
		return $this->ingredient;
	}

	public function setIngredient(?Ingredient $ingredient): self
	{
		$this->ingredient = $ingredient;

		return $this;
	}

	public function getQuantite(): float
	{
		return $this->quantite;
	}

	public function setQuantite(float $quantite): self
	{
		$this->quantite = $quantite;

		return $this;
	}

	public function getTypeQuantite(): ?TypeQuantite
	{
		return $this->typeQuantite;
	}

	public function setTypeQuantite(?TypeQuantite $type): self
	{
		$this->typeQuantite = $type;

		return $this;
	}
}

