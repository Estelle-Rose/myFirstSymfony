<?php

namespace App\Controller;
use App\Entity\Continent;
use App\Repository\ContinentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContinentController extends AbstractController
{
    #[Route('/continents', name: 'continents')]
    public function index(ContinentRepository $repository): Response
    {
        $continents = $repository->findAll();
        return $this->render('continent/index.html.twig', [
            'controller_name' => 'Les continents',
            'continents' => $continents
        ]);
    }
    #[Route('/continents/{id}', name: 'continent')]
    public function getContinent(Continent $continent): Response
    {
        
        return $this->render('continent/continent.html.twig', [
            'controller_name' => 'Les continents',
            'continent' => $continent
        ]);
    }
}
