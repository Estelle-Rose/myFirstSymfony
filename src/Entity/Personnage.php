<?php

namespace App\Entity;

class Personnage {
    public $pseudo;
    public $age;
    public $sexe;
    public $image;
    public $carac = [];
    public static $players = [];

    public function __construct($pseudo, $age,$sexe,$image,$carac) {
        $this->pseudo = $pseudo;
        $this->age = $age;
        $this->sexe = $sexe;
        $this->image = $image;
        $this->carac = $carac;
        self::$players[] = $this;
    }
    public static function createPlayer() {
        $p1 = new Personnage('Bartolomé Ortiz', 35,1,'bartolome_ortiz.png',['force'=>5,'discretion'=>2,'agilite'=>2, 'arme' => 'massue']);
        $p2 = new Personnage('Aguilar de Nehra', 28,1,'aguilar_de_nehra.png',['force'=>3,'discretion'=>3,'agilite'=>4, 'arme' => 'épée']);
        $p3 = new Personnage('Maria', 24,0,'maria.png',['force'=>2,'discretion'=>5,'agilite'=>5, 'arme' => 'lame secrète']);
        $p4 = new Personnage('Shao Jun', 21,0,'shao_jun.png',['force'=>4,'discretion'=>2,'agilite'=>4, 'arme' => 'épée']);
    }
   
}