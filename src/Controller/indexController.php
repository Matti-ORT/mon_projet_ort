<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route(path : '/')]
class indexController extends AbstractController
{
   


    #[Route(path: '/hello/{name}')]

    public function hello(Request $request, string $name): Response
    {
        dump ($request->query->get('module'));


        return $this->render(

        view : 'index.html.twig',
        
        parameters : [
            'name' => $name
        ]
    );
    }
    
}