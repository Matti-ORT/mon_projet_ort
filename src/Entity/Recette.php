<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

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

    private ?int $nb_personnes = null;
    private ?NiveauRecettesEnums $niveau = null;

    private ?int $temps_de_repos;
    private ?string $photo = null;


    #[ORM\ManyToMany(targetEntity: Categorie::class)]
    private Collection $categories;



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
	public function getnbperonnes(): int
    {
        return $this->nb_personnes;
    }


    // temps de repos

    public function gettempsderepos(): int
    {
        return $this->temps_de_repos;
    }

    // Photo
    public function getphoto(): string
    {
        return $this->photo;
    }


    // Catergorie

    public function getcategorie(): string
    {
        return $this->categorie;
    }

}
