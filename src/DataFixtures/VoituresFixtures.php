<?php

namespace App\DataFixtures;

use App\Entity\Marque;
use App\Entity\Modele;
use App\Entity\Voiture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class VoituresFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $marque1 = new Marque();
        $marque1->setLibelle("Pagaut");
        $manager->persist($marque1);

        $marque2 = new Marque();
        $marque2->setLibelle("Motoya");
        $manager->persist($marque2);
        
        $modele1 = new Modele();
        $modele1->setLibelle("Rayis")
                ->setImage("modele1.jpg")
                ->setPrixMoyen(15000)
                ->setMarque($marque1);
        $manager->persist($modele1);

        $modele2 = new Modele();
        $modele2->setLibelle("Yraos")
                ->setImage("modele2.jpg")
                ->setPrixMoyen(11000)
                ->setMarque($marque1);       
        $manager->persist($modele2);

        $modele3 = new Modele();
        $modele3->setLibelle("204")
                ->setImage("modele3.jpg")
                ->setPrixMoyen(9900)
                ->setMarque($marque2);      
        $manager->persist($modele3);

        $modele4 = new Modele();
        $modele4->setLibelle("404")
                ->setImage("modele4.jpg")
                ->setPrixMoyen(16000)
                ->setMarque($marque2);        
        $manager->persist($modele4);

        $modele5 = new Modele();
        $modele5->setLibelle("804")
                ->setImage("modele5.jpg")
                ->setPrixMoyen(24000)
                ->setMarque($marque2);      
        $manager->persist($modele5);


        //utilisation de faker
        $modeles = [$modele1,$modele2,$modele3,$modele4,$modele5];
       
        foreach ($modeles as $modele) {
            // variable $rand : nombre de voitures généré pour chaque modèle (min 3 et max 5)
           $rand = rand(3,5);
           for($i=1; $i <= $rand; $i++ ) {
               $voiture = new Voiture();
               // immmat : XX1234XX               
                $letters = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"),0,4);
                $immat = rand(0,9).rand(0,9).$letters.rand(0,9).rand(0,9);
               $voiture->setImmatriculation($immat)
                        ->setNbPortes(rand(3,5))
                        ->setAnnee(rand(1990,2000))
                        ->setModele($modele);
                $manager->persist($voiture);
           }
        }

        $manager->flush();
    }
}
