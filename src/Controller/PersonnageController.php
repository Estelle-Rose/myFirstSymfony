<?php

namespace App\Controller; // indique dans quel dossier est le fichier

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonnageController extends AbstractController
{
    #[Route('/', name: 'personnage')] //
    public function index(): Response
    {
        return $this->render('personnage/index.html.twig', [
            'controller_name' => 'Personnages',
        ]);
    }
    #[Route('/persos', name: 'persos')] //
    public function persos(): Response
    {
        return $this->render('personnage/persos.html.twig', [
            'controller_name' => 'Personnages',
        ]);
    }
}
