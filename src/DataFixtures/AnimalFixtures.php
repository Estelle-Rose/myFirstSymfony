<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use App\Entity\Dispose;
use App\Entity\Famille;
use App\Entity\Personne;
use App\Entity\Continent;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AnimalFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $p1 = new Personne();
        $p1->setNom("Milo");
        $manager->persist($p1); 
        $p2 = new Personne();
        $p2->setNom("Maria");
        $manager->persist($p2); 
        $p3 = new Personne();
        $p3->setNom("Jack");
        $manager->persist($p3); 


        $c1 = new Continent();
        $c1->setLibelle("Europe");
        $manager->persist($c1);
        $c2 = new Continent();
        $c2->setLibelle("Asie");
        $manager->persist($c2);
        $c3 = new Continent();
        $c3->setLibelle("Afrique");
        $manager->persist($c3);
        $c4 = new Continent();
        $c4->setLibelle("Océanie");
        $manager->persist($c4);
        $c5 = new Continent();
        $c5->setLibelle("Amérique");
        $manager->persist($c5);

        // création des familles
        $b1 = new Famille();
        $b1->setLibelle("Mammifères")
            ->setDescription("Animaux vertébrés nourrissants leurs petits avec du lait");
        $manager->persist($b1);

        $b2 = new Famille();
        $b2->setLibelle("Reptiles")
            ->setDescription("Animaux vertébrés rampants");
        $manager->persist($b2);

        $b3 = new Famille();
        $b3->setLibelle("Poissons")
            ->setDescription("Animaux invertébrés du monde aquatique");
        $manager->persist($b3);

        $a1 = new Animal();
        $a1 -> setNom("Chien")
            ->setDescription("Un animal domestique")
            ->setImage("chien.png")
            ->setPoids(10)
            ->setDangereux(false)
            ->setFamille($b1)
            ->addContinent($c1) // l'animal est ajouté au continent et le continent est ajouté à l'animal
            ->addContinent($c2)
            ->addContinent($c3)
            ->addContinent($c4)
            ->addContinent($c5);
            
        $manager->persist($a1); // persist ajoute l'élément à la requête

        $a2 = new Animal();
        $a2 -> setNom("Cochon")
            ->setDescription("Un animal d'élevage")
            ->setImage("cochon.png")
            ->setPoids(300)
            ->setDangereux(false)
            ->setFamille($b1)
            ->addContinent($c1)
            ->addContinent($c5);
        $manager->persist($a2);

        $a3 = new Animal();
        $a3 -> setNom("Serpent")
            ->setDescription("Un animal dangereux")
            ->setImage("serpent.png")
            ->setPoids(5)
            ->setDangereux(true)
            ->setFamille($b2)
            ->addContinent($c1)
            ->addContinent($c2)
            ->addContinent($c3)
            ->addContinent($c4)
            ->addContinent($c5);
        $manager->persist($a3);

        $a4 = new Animal();
        $a4 -> setNom("Crocodile")
            ->setDescription("Un animal très dangereux")
            ->setImage("croco.png")
            ->setPoids(500)
            ->setDangereux(true)
            ->setFamille($b2)
            ->addContinent($c3)
            ->addContinent($c4);
        $manager->persist($a4);

        $a5 = new Animal();
        $a5 -> setNom("Requin")
            ->setDescription("Un animal marin très dangereux")
            ->setImage("requin.png")
            ->setPoids(800)
            ->setDangereux(true)
            ->setFamille($b3)
            ->addContinent($c4)
            ->addContinent($c5);
        $manager->persist($a5);

        $d1 = new Dispose();
        $d1->setPersonne($p1)
            ->setAnimal($a1)
            ->setNb(16);
        $manager->persist($d1);

        $d2 = new Dispose();
        $d2->setPersonne($p1)
            ->setAnimal($a2)
            ->setNb(20);
        $manager->persist($d2);

        $d3 = new Dispose();
        $d3->setPersonne($p2)
            ->setAnimal($a3)
            ->setNb(5);
        $manager->persist($d3);

        $d4 = new Dispose();
        $d4->setPersonne($p2)
            ->setAnimal($a4)
            ->setNb(1);
        $manager->persist($d4);

        $d5 = new Dispose();
        $d5->setPersonne($p2)
            ->setAnimal($a1)
            ->setNb(2);
        $manager->persist($d5);

        $d6 = new Dispose();
        $d6->setPersonne($p3)
            ->setAnimal($a5)
            ->setNb(10);
        $manager->persist($d6);




        $manager->flush(); // envoie la requête en bdd

        
    }
}
