<?php

namespace App\Repository;

use App\Entity\IngredientRecette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IngredientRecette>
 */
class IngredientRecetteRepository extends ServiceEntityRepository
{
	public function __construct(ManagerRegistry $registry)
	{
		parent::__construct($registry, IngredientRecette::class);
	}
}
