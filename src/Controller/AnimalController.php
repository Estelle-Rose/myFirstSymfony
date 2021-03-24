<?php

namespace App\Controller;

use App\Repository\AnimalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnimalController extends AbstractController
{
    #[Route('/animal', name: 'accueil_animaux')]
    public function index(): Response
    {
        return $this->render('animal/index.html.twig');
    }
    #[Route('/animal/animals', name: 'animals')]
    public function getAnimaux(AnimalRepository $repository): Response
    {
        
        $animaux = $repository->findAll(); // on recupère les animaux de la bdd
        return $this->render('animal/animals.html.twig', [
            'animals' => $animaux
        ]);
    }
    #[Route('/animal/{id}', name: 'animal')]
    public function getAnimalByiD(AnimalRepository $repository, $id): Response
    {
        
        $animal = $repository->find($id); // on recupère l'animal' de la bdd
        return $this->render('animal/animal.html.twig', [
            'animal' => $animal
        ]);
    }
}

