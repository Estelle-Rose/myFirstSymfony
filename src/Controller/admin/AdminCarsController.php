<?php

namespace App\Controller\admin;

use App\Entity\Voiture;
use App\Entity\RechercheVoiture;
use App\Form\RechercheVoitureType;
use App\Form\VoitureType;
use App\Repository\VoitureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminCarsController extends AbstractController
{
    
    #[Route('/admin/cars', name: 'admin_cars')]
    public function index(VoitureRepository $repo, PaginatorInterface $paginatorInterface, Request $request): Response
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
            'page_title' => 'Gestion des voitures',
           'cars' => $cars,
           'form' => $form->createView(),
           "is_admin" => true
        ]);
    }
    #[Route('/admin/cars/add', name: 'add_cars')]
    #[Route('/admin/cars/{id}', name: 'update_cars', methods:['GET', 'POST'])]
    public function addOrUpdateCar(Voiture $voiture = null, EntityManagerInterface $manager, Request $request): Response
    { 
        if(!$voiture) {
            $voiture = new Voiture();
        }
        $form = $this->createForm(VoitureType::class, $voiture);
        $form->handleRequest($request);
       if($form->isSubmitted() && $form->isValid()) {
        $modif = $voiture->getId() != null;
        $manager->persist($voiture);
        $manager->flush();
        $this->addFlash('success',($modif) ?'La voiture a bien été modifiée' : 'La voiture a bien été ajoutée');
       }
    
        return $this->render('admin_cars/addOrUpdateCar.html.twig', [
           'voiture' => $voiture,      
           'form' => $form->createView(),
           "is_admin" => true,
           'modif' => $voiture->getId() != null
        ]);
    }
    #[Route('/admin/cars/{id}', name: 'delete_cars', methods:['DELETE'])]
    public function deleteCar(Voiture $car, EntityManagerInterface $manager, Request $request): Response
    { 
        if($this->isCsrfTokenValid("DELETE".$car->getId(), $request->get("_token"))){

            if (!$car) {
                throw $this->createNotFoundException(
                    "La voiture n'a pas été trouvé en base de données" 
                );
            }
            $manager->remove($car);
            $manager->flush();  
            $this->addFlash('success','La voiture a bien été supprimée'); 
            return $this->redirectToRoute('admin_cars');
        }
        
          
    }
}
