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
    #[Route('/aliments/{calorie}', name: 'low-calories')]
    public function getAlimentsLowCalories(AlimentRepository $repository , $calorie): Response
    {
        $aliments = $repository->findByCaloriesNb($calorie);
        return $this->render('aliment/aliments.html.twig', [
            'page_title' => 'Les aliments contenant moins de 50kcal',
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
