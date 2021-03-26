<?php

namespace App\Controller;

use App\Entity\Aliment;
use App\Repository\AlimentRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AlimentController extends AbstractController
{
    #[Route('/epicerie', name: 'accueil_aliments')]
    public function index(): Response
    {
        return $this->render('aliment/index.html.twig', [
            'page_title' => 'Accueil de l\'épicerie',
        ]);
    }
    #[Route('/aliments', name: 'aliments')]
    public function getVeggies(AlimentRepository $repository): Response
    {
        $aliments = $repository->findAll();
        return $this->render('aliment/aliments.html.twig', [
            'page_title' => 'Les aliments disponibles',
            'aliments' => $aliments
        ]);
    }
    #[Route('/aliments/calories/{calorie}', name: 'low-calories')]
    public function getAlimentsLowCalories(AlimentRepository $repository , $calorie): Response
    {
        $aliments = $repository->filterByEnergyValue('calories', '<', $calorie);
        return $this->render('aliment/aliments.html.twig', [
            'page_title' => 'Les aliments contenant moins de 50kcal',
            'aliments' => $aliments
        ]);
    }
    // il faut rajouter le filtre dans la route pour que symfony puisse faire la différence et afficher la bonne page
    #[Route('/aliments/glucides/{glucide}', name: 'low-glucids')]
    public function getAlimentsLowGlucids(AlimentRepository $repository , $glucide): Response
    {
        $aliments = $repository->filterByEnergyValue('glucides', '<', $glucide);
        return $this->render('aliment/aliments.html.twig', [
            'page_title' => 'Les aliments contenant moins de 5gr de glucides au 100gr',
            'aliments' => $aliments
        ]);
    }
    #[Route('/aliments/{id}', name: 'aliment')]
    public function getVeggie(Aliment $aliment): Response
    {
        $title = $aliment->getNom();
        return $this->render('aliment/aliment.html.twig', [
            'page_title' => $title,
            'aliment' => $aliment
        ]);
    }
}
