<?php

namespace App\Controller;
use App\Entity\Famille;
use App\Repository\FamilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FamilleController extends AbstractController
{
    #[Route('/familles', name: 'familles')]
    public function index( FamilleRepository $repository): Response
    {
        $familles = $repository->findAll();
        
        return $this->render('famille/index.html.twig', [
            'familles' => $familles
        ]);
    }
    #[Route('/familles/{id}', name: 'famille')]
    public function getFamille( Famille $famille): Response // avec le converteur  symfony recherche directement la famille correspondant à l'id passé en paramètre
    {
        return $this->render('famille/famille.html.twig', [
            'famille' => $famille
        ]);
    }
    
}
