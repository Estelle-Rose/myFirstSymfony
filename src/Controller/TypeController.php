<?php

namespace App\Controller;

use App\Repository\TypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypeController extends AbstractController
{
    #[Route('/epicerie/categories', name: 'categories')]
    public function index(TypeRepository $repo ): Response
    {
        $types = $repo->findAll();
        return $this->render('type/index.html.twig', [
            'page_title' => 'Les catégories d\'aliments',
            'types' => $types
        ]);
    }
    
   /*   #[Route('/epicerie/categories/{nom}', name: 'aliments')]
    public function getAllAlimentsByCategory(TypeRepository $repository, $nom): Response
    {
        $aliments = $repository->getAlimentsByCategory($nom);
        return $this->render('aliment/aliments.html.twig', [
            'page_title' => 'Les aliments disponibles',
            'aliments' => $aliments
        ]);
    } */
}
