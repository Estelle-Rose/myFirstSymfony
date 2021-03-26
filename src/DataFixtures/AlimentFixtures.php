<?php

namespace App\DataFixtures;

use App\Entity\Aliment;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AlimentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $a1 = new Aliment(); // création du premier légume
        $a1 ->setNom('Carotte')
            ->setPrix(1.80)
            ->setCalories(36)
            ->setImage("legumes/carotte.png")
            ->setProteines(0.77)
            ->setGlucides(6.45)
            ->setLipides(0.26);
        $manager->persist($a1);

        $a2 = new Aliment();
        $a2 ->setNom('Patate')
            ->setPrix(1.50)
            ->setCalories(80)
            ->setImage("legumes/patate.jpg")
            ->setProteines(1.80)
            ->setGlucides(16.7)
            ->setLipides(0.34);
        $manager->persist($a2);

        $a3 = new Aliment();
        $a3 ->setNom('Tomate')
            ->setPrix(2.3)
            ->setCalories(18)
            ->setImage("legumes/tomate.png")
            ->setProteines(0.86)
            ->setGlucides(2.26)
            ->setLipides(0.24);
        $manager->persist($a3);

        $a4 = new Aliment();
        $a4 ->setNom('Pomme')
            ->setPrix(2.35)
            ->setCalories(52)
            ->setImage("legumes/pomme.png")
            ->setProteines(0.25)
            ->setGlucides(14)
            ->setLipides(0.25);
        $manager->persist($a4);



        $manager->flush();
    }
}
