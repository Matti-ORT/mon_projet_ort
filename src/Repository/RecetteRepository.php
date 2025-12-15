<?php

namespace App\Repository;

use App\Entity\Recette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @extends ServiceEntityRepository<Recette>
 */
class RecetteRepository extends ServiceEntityRepository
{
	public function __construct(ManagerRegistry $registry)
	{
		parent::__construct($registry, Recette::class);
	}



    public function getAllForeListe(): array
    {
        return $this-> createQueryBuilder('r')
            ->leftJoin('r.ingredientRecettes', 'i_r')
            ->addSelect('i_r')
            ->leftJoin('i_r.ingredient', 'i')
            ->addSelect('i')
            ->leftJoin('i_r.typeQuantite', 'qt_t')
            ->addSelect('qt_t')

            ->where('r.nom Like :nom')
            ->setParameter('nom', '%%')
            ->andWhere('r.tempsPreparation < 30')
        
            ->orderBy('r.nom')
            ->getQuery()
            ->getResult();
            
    }

    public function getFortDetails(Recette $recette): ?Recette
    {
        return $this-> createQueryBuilder('r')
            ->innerJoin('r.ingredientRecettes', 'i_r')
            ->addSelect('i_r')
            ->INNERJoin('i_r.ingredient', 'i')
            ->addSelect('i')
            ->leftJoin('i_r.typeQuantite', 'qt_t')
            ->addSelect('qt_t')

            ->leftJoin('r.etapes', 'e')
            ->addSelect('e')

            ->leftJoin('r.categorie', 'c')
            ->addSelect('c')

            ->where('r.id = :id')
            ->setParameter('id', $recette->getId())
        
            ->orderBy('r.nom')
            ->getQuery()
            ->getSingleResult();
    }
}
