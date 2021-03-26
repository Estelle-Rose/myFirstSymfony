<?php

namespace App\Controller\admin;

use App\Entity\Aliment;
use App\Form\AlimentType;
use App\Repository\AlimentRepository;
use Doctrine\ORM\EntityManagerInterface;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminAlimentController extends AbstractController
{
    #[Route('/admin/aliment', name: 'admin_aliment')]
    public function index(AlimentRepository $repository): Response
    {
        $aliments = $repository->findAll();
        return $this->render('admin/admin_aliment/index.html.twig', [
            'page_title' => 'Administration des aliments',
            'aliments' => $aliments
        ]);
    }



    // 2 routes pour une double fonction
    #[Route('/admin/aliment/ajouter', name: 'add_aliment')]
    #[Route('/admin/aliment/modifier/{id}', name: 'update_aliment')]
    public function addOrUpdateAliment(Aliment $aliment = null,Request $request, EntityManagerInterface $manager ): Response
    {       
       if(!$aliment) {
           $aliment = new Aliment();
       }
     
        $form = $this->createForm(AlimentType::class, $aliment); // On génère le formulaire en le nommant et en le bindant à la classe aliment et on envoie les données de l'aliment avec l'objet' $aliment
        $form->handleRequest($request); //
        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($aliment);
            $manager->flush();
            return $this->redirectToRoute("admin_aliment"); // retour à la page administration
        }
        return $this->render('admin/admin_aliment/addOrUpdateAliment.html.twig', [
           
            'aliment' => $aliment,
            'form' => $form->createView(), // on souhaite ici uniquement envoyer la partie affichage du formulaire
            'modification'=> $aliment->getId() !== null // la clé modification renvoie true si il y a un aliment (s'il il y a un id) et false dans le cas contraire
        ]);
    }
    #[Route('/admin/aliment/{id}', name: 'delete_aliment')]
    public function deleteAliment( EntityManagerInterface $manager, $id): Response
    {
        
        $aliment = $manager->getRepository(Aliment::class)->find($id);
        if (!$aliment) {
            throw $this->createNotFoundException(
                "L'aliment n'a pas été trouvé en base de données" .$id
            );
        }

        $manager->remove($aliment);
        $manager->flush();
        return $this->redirectToRoute('admin_aliment');
    }
}
