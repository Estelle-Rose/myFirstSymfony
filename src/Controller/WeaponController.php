<?php

namespace App\Controller;
use App\Entity\Arme;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeaponController extends AbstractController
{
    #[Route('/weapon', name: 'weapons')]
    public function index(): Response
    {
        Arme::createWeapon();

        return $this->render('weapon/index.html.twig', [
            'armes' => Arme::$armes
        ]);
    }
    #[Route('/weapon/{id}', name: 'afficher_weapon')]
    public function getOneWeapon($id): Response
    {       
        Arme::createWeapon(); 
        $arme = Arme::getWeaponById($id);

        return $this->render('weapon/arme.html.twig', [
            'arme' => $arme
        ]);
    }
}
