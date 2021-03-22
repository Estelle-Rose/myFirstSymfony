<?php

namespace App\Controller; // indique dans quel dossier est le fichier

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonnageController extends AbstractController
{
    #[Route('/', name: 'accueil')] //
    public function index(): Response
    {
        return $this->render('personnage/index.html.twig', [
            'controller_name' => 'Personnages',
        ]);
    }
    #[Route('/persos', name: 'personnages')] //
    public function persos(): Response
    {
        $p1 = [
            'pseudo' => "Bartolomé Ortiz ",
             'image' => 'bartolome_ortiz.png',
             'age' => 35,
             'carac'=> [
                 'force'=> 5,
                 'discretion' => 2,
                 'agilité' => 2,
                 'arme' => 'massue'
             ]
        ];
        $p2 = [
            'pseudo' => "Aguilar de Nehra ",
             'image' => 'aguilar_de_nehra.png',
             'age' => 28,
             'carac'=> [
                 'force'=> 3,
                 'discretion' => 3,
                  'agilité' => 4,
                 'arme' => 'épée'
             ]
        ];
        $p3 = [
            'pseudo' => "Maria ",
             'image' => 'maria.png',
             'age' => 24,
             'carac'=> [
                 'force'=> 2,
                 'discretion' => 5,
                 'agilité' => 5,
                 'arme' => 'lame secrète'
             ]
        ];
        $p4 = [
            'pseudo' => "Shao Jun ",
             'image' => 'shao_jun.png',
             'age' => 21,
             'carac'=> [
                 'force'=> 4,
                 'discretion' => 2,
                 'arme' => 'épée'
             ]
        ];
        $players = [
            'j1' =>$p1,
            'j2' =>$p2,
            'j3' =>$p3,
            'j4' =>$p4,
        ];
        return $this->render('personnage/persos.html.twig', [
            'controller_name' => 'Personnages',            
             'players' => $players
            
        ]);
    }
}
