<?php
declare(strict_types=1);
namespace App\Controller\Recettes;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Recette;


#[Route(
    path : '/recettes/{id}/details',
    name: 'app_recettes_recettes_details_get',
    
    )]

class RecettesDetailsgetController extends AbstractController
{
    public function __construct(/*private readonly RecetteRepository $recetteRepository,*/)
    {
         
    }

    public function __invoke(Recette $recette): Response
    {
        return $this->render(
            'pages/Recettes/details/page.html.twig', [
            'recette' => $recette,
        ]);
    }
}
?>