<?php

namespace App\Repository;

use App\Entity\TypeQuantite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeQuantite>
 */
class TypeQuantiteRepository extends ServiceEntityRepository
{
	public function __construct(ManagerRegistry $registry)
	{
		parent::__construct($registry, TypeQuantite::class);
	}
}
