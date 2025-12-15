<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Enum\NiveauRecettesEnums;

#[ORM\Entity(repositoryClass: \App\Repository\RecetteRepository::class)]
class Recette
{
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column(type: 'integer')]
	private ?int $id = null;

	#[ORM\Column(type: 'string', length: 255)]
	private string $nom;

	#[ORM\Column(type: 'integer')]
	private int $tempsPreparation = 0;

	#[ORM\Column(type: 'integer')]
	private int $tempsCuisson = 0;

    
    // nouvelle fonctionnalité

	#[ORM\Column(type: 'integer', nullable: true)]
	private ?int $nbPersonnes = null;

	#[ORM\Column(enumType: NiveauRecettesEnums::class, nullable: true)]
	private ?NiveauRecettesEnums $niveau = null;

	#[ORM\Column(type: 'integer', nullable: true)]
	private ?int $tempsDeRepos = null;

	#[ORM\Column(type: 'string', length: 255, nullable: true)]
	private ?string $photo = null;

	#[ORM\ManyToMany(targetEntity: Categorie::class)]
	private Collection $categories;

	#[ORM\ManyToOne(targetEntity: Categorie::class)]
	private ?Categorie $categorie = null;



	#[ORM\OneToMany(mappedBy: 'recette', targetEntity: IngredientRecette::class, orphanRemoval: true, cascade: ['persist'])]
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

	public function getTempsPreparation(): int
	{
		return $this->tempsPreparation;
	}

	public function setTempsPreparation(int $minutes): self
	{
		$this->tempsPreparation = $minutes;

		return $this;
	}

	public function getTempsCuisson(): int
	{
		return $this->tempsCuisson;
	}

	public function setTempsCuisson(int $minutes): self
	{
		$this->tempsCuisson = $minutes;

		return $this;
	}

	public function getIngredientRecettes(): Collection
	{
		return $this->ingredientRecettes;
	}


    // nouvelle fonctionnalité


	// nombre de personnes
	public function getNbPersonnes(): ?int
	{
		return $this->nbPersonnes;
	}

	public function setNbPersonnes(?int $nbPersonnes): self
	{
		$this->nbPersonnes = $nbPersonnes;
		return $this;
	}

	// niveau de la recette
	public function getNiveau(): ?NiveauRecettesEnums
	{
		return $this->niveau;
	}

	public function setNiveau(?NiveauRecettesEnums $niveau): self
	{
		$this->niveau = $niveau;
		return $this;
	}

	


	// temps de repos
	public function getTempsDeRepos(): ?int
	{
		return $this->tempsDeRepos;
	}

	public function setTempsDeRepos(?int $tempsDeRepos): self
	{
		$this->tempsDeRepos = $tempsDeRepos;
		return $this;
	}

	// Photo
	public function getPhoto(): ?string
	{
		return $this->photo;
	}

	public function setPhoto(?string $photo): self
	{
		$this->photo = $photo;
		return $this;
	}

	// Categorie
	public function getCategorie(): ?Categorie
	{
		return $this->categorie;
	}

	public function setCategorie(?Categorie $categorie): self
	{
		$this->categorie = $categorie;
		return $this;
	}
}
