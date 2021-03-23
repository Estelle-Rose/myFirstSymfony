<?php

namespace App\Entity;

class Arme {
    private $id;
    private $name;
    private $attack;
    private $speed;
    private $weight;
    private $image;
    private $bio;
   
    public static $armes = [];
    

    public function __construct($id,$name, $attack,$speed,$weight,$image,$bio) {
        $this->id = $id;
        $this->name = $name;
        $this->attack = $attack;
        $this->speed = $speed;
        $this->weight = $weight;
        $this->image = $image;
        $this->bio = $bio;
       
        self::$armes[] = $this;
       
    }

    // getters
    public function getId(){ return $this->id;}
    public function getName(){ return $this->name;}
    public function getAttack(){ return $this->attack;}
    public function getSpeed(){ return $this->speed;}
    public function getWeight(){ return $this->weight;}
    public function getImage(){ return $this->image;}
    public function getBio(){ return $this->bio;}

    //setters
    public function setId($id){ return $this->id = $id;}
    public function setName($name){ return $this->name = $name;}
    public function setAttack($attack){ return $this->attack = $attack;}
    public function setSpeed($speed){ return $this->speed = $speed;}
    public function setWeight($weight){ return $this->weight = $weight;}
    public function setImage($image){ return $this->image = $image;}
    public function setBio($bio){ return $this->bio = $bio;}

    public static function createWeapon() {
        $a1 = new Arme(1,'Arc', 35,68,10,'arc.jpg',"Pas toxique mais tout aussi mortel");
        $a2 = new Arme(2,'Marteau', 49,51,12,'marteau.jpg',"Une arme puissante forgée par l'arrière-grand-père de Gunnar de Fornburg. Notez les belles gravures et l'équilibre optimal.");
        $a3 = new Arme(3,'Longue épée',71,41,18,'longue-epee.jpg',"");
        $a4 = new Arme(4,'Dague', 44,70,9,'dagger.jpg',"Ce couteau aiguisé laisse des blessures béantes dans la chair de ses victimes, très similaires aux marques de morsure des chiens sauvages");
    }
    public static function getWeaponById($id) {
        foreach (self::$armes as $arme) {
            if((int)$id === $arme->getId()) {
                return $arme;
            }
        }
    }
   
}