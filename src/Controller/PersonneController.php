<?php

namespace App\Controller;

use App\Entity\Personne;
use App\Repository\PersonneRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PersonneController extends AbstractController
{
    #[Route('/personnes', name: 'personnes')]
    public function index(PersonneRepository $repository): Response
    {
        $personnes = $repository->findAll();
        return $this->render('personne/index.html.twig', [
            'controller_name' => 'Personnes',
            'personnes'=> $personnes
        ]);
    }
    #[Route('/personnes/{id}', name: 'afficher_personne')]
    public function getPersonne(Personne $personne): Response
    {
        return $this->render('personne/personne.html.twig', [
           
            'personne'=> $personne
        ]);
    }
}
