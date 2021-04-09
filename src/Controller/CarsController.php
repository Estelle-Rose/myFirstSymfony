<?php

namespace App\Controller;

use App\Entity\RechercheVoiture;
use App\Form\RechercheVoitureType;

use App\Repository\VoitureRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarsController extends AbstractController
{
    #[Route('/cars/accueil', name: 'accueil_cars')]
    public function index(): Response
    {
       
        return $this->render('cars/index.html.twig', [
           
        ]);
    }

   

    #[Route('/client/voitures', name: 'cars')]
    public function getCars(VoitureRepository $repo, PaginatorInterface $paginatorInterface, Request $request): Response
    { 
        $rechercheVoiture = new RechercheVoiture();
        $form = $this->createForm(RechercheVoitureType::class, $rechercheVoiture);
        $form->handleRequest($request);
        $cars = $paginatorInterface->paginate(
        $repo->findAllWithPagination($rechercheVoiture), /* query NOT result */
        $request->query->getInt('page', 1), /*page number*/
        6 /*limit per page*/
    );
        return $this->render('cars/cars.html.twig', [
            'page_title' => 'Nos voitures disponibles à la location',
           'cars' => $cars,
           'form' => $form->createView(),
           'is_admin' => false
        ]);
    }
}
