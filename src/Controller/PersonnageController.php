<?php

namespace App\Controller; // indique dans quel dossier est le fichier

use App\Entity\Personnage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PersonnageController extends AbstractController
{
    #[Route('/', name: 'accueil')] //
    public function index(): Response
    {
        return $this->render('personnage/index.html.twig' );
    }

    #[Route('/persos', name: 'personnages')] //
    public function persos(): Response
    {
        Personnage::createPlayer();
        
        return $this->render('personnage/persos.html.twig', [                      
             'players' => Personnage::$players            
        ]);
    }
    #[Route('/persos/{id}', name: 'afficher_personnage')] //
    public function displayPerso($id): Response
    {
        Personnage::createPlayer();
        
        $player = Personnage::getPlayerById($id);   
         return $this->render('personnage/perso.html.twig', [        
           'player' =>     $player
       ]);
    }
}
