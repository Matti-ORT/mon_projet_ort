<?php
namespace App\Controller\Recettes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\RecetteRepository;   
use App\Form\Recettes\RecetteType;
use App\Entity\Recette;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

#[Route(path: '/recettes/creation/' ,name: 'app_recettes_recette_creation_get')]


class RecetteCreationGetController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,

    )
    {

    }

    public function __invoke(Request $request): Response
    {
        $rectette = new Recette();
        $form = $this->createForm(RecetteType::class, $rectette);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->entityManager->persist($rectette);
            $this->entityManager->flush();
            
            return $this->redirectToRoute('app_recettes_recettes_liste_get');
        }

        return $this->render(
            'pages/Recettes/creation/form.html.twig', [
                'form' => $form->createView(),
        ]);
    }

}