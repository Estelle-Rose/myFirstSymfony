<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AnimalFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
            $a1 = new Animal();
        $a1 -> setNom("Chien")
            ->setDescription("Un animal domestique")
            ->setImage("chien.png");
        $manager->persist($a1); // persist ajoute l'élément à la requête

        $a2 = new Animal();
        $a2 -> setNom("Cochon")
            ->setDescription("Un animal d'élevage")
            ->setImage("cochon.png");
        $manager->persist($a2);

        $a3 = new Animal();
        $a3 -> setNom("Serpent")
            ->setDescription("Un animal dangereux")
            ->setImage("serpent.png");
        $manager->persist($a3);

        $a4 = new Animal();
        $a4 -> setNom("Crocodile")
            ->setDescription("Un animal très dangereux")
            ->setImage("crocodile.png");
        $manager->persist($a3);

        $a5 = new Animal();
        $a5 -> setNom("Requin")
            ->setDescription("Un animal marin très dangereux")
            ->setImage("requin.png");
        $manager->persist($a5);




        $manager->flush(); // envoie la requête en bdd

        $manager->flush();
    }
}
