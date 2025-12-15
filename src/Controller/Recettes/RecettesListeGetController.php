<?php

namespace App\Controller\Recettes;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\RecetteRepository;


final class RecettesListeGetController extends AbstractController
{
    #[Route('/recettes/liste/get', name: 'app_recettes_recettes_liste_get')]
    public function index(RecetteRepository $recetteRepository): Response
    {
        $recettes = $recetteRepository->getAllForeListe();

        return $this->render('pages/Recettes/liste/liste.html.twig', [
            'recettes' => $recettes,
        ]);
    }


    
}
