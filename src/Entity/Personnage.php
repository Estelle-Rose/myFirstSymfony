<?php

namespace App\Entity;

class Personnage {
    public $id;
    public $pseudo;
    public $age;
    public $sexe;
    public $image;
    public $bio;
    public $carac = [];
    public static $players = [];
    

    public function __construct($id,$pseudo, $age,$sexe,$image,$bio,$carac) {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->age = $age;
        $this->sexe = $sexe;
        $this->image = $image;
        $this->bio = $bio;
        $this->carac = $carac;
        self::$players[] = $this;
       
    }
    public static function createPlayer() {
        $p1 = new Personnage(1,'Bartolomé Ortiz', 35,1,'bartolome_ortiz.png',"Bartolomé Ortiz était un maître forgeron de la Renaissance renommé dans toute l'Espagne pour ses armes fabriquées dans le meilleur acier de Tolède. Sa stature imposante, sa force et son penchant pour le vin lui valurent une réputation d'homme redoutable. Cependant, sous des dehors bourrus, Ortiz était un homme plein de bonté qui prenait très à cœur son métier et tirait une grande fierté des armes qu'il fabriquait.

        Cela le peinait de voir les soldats de l'Inquisition s'en servir pour opprimer certains de ses concitoyens. Cela le décida à quitter le travail de la forge pour monter une affaire avec son ami Diego. Mais sa retraite fut de courte durée, des sbires de l'Inquisition ayant exécuté Diego pour avoir tenté de protéger une innocente jeune fille qu'ils harcelaient.

        À la fois atterré et furieux, Ortiz rejoignit les Assassins à qui il offrit non seulement sa force, mais aussi son talent de forgeron, et il fabriqua pour eux des armes qui vengeraient son ami.",['force'=>5,'discretion'=>2,'agilite'=>2, 'arme' => 'massue']);
        $p2 = new Personnage(2,'Aguilar de Nehra', 28,1,'aguilar_de_nehra.png',"Aguilar de Nerha était un membre de la branche espagnole de la Confrérie des Assassins, à l'époque de la Renaissance. Il a consacré sa vie à lutter contre les Templiers et l'Inquisition dirigée par Tomás de Torquemada.
        Fils de deux membres de la Confrérie des Assassins, Aguilar a tout d'abord rejeté le Crédo de ses parents, préférant vivre sans s'engager. Mais ceux-ci ont été capturés par l'Inquisition menée par les Templiers et condamnés au bûcher. Accablé par les regrets, il a officiellement rejoint la Confrérie afin de les venger, mais aussi pour honorer leur Crédo dont il avait entre-temps compris la signification.
        Durant sa formation d'Assassin, Aguilar s'est montré très doué pour le combat et les acrobaties et est rapidement devenu l'un des membres les plus efficaces de la Confrérie. Aguilar a été un rouage essentiel de l'expansion des Assassins en Espagne et de leur succès face aux Templiers. Il est d'ailleurs devenu ensuite le Mentor de la Confrérie en Espagne.",['force'=>3,'discretion'=>3,'agilite'=>4, 'arme' => 'épée']);
        $p3 = new Personnage(3,'Maria', 24,0,'maria.png',"María était un Maître Assassin de la branche espagnole de la Confrérie durant la Renaissance, ainsi que l'alliée proche et la maîtresse d'Aguilar de Nerha.

        D'une nature réservée, María dévoilait rarement ses sentiments, mais était dévouée corps et âme au Crédo des Assassins. Elle a consacré sa vie à lutter contre les méfaits qu'imposait l'influence des Templiers à son pays.

        Extrêmement rapide et silencieuse, elle excellait dans les missions d'assassinat discret. Les origines de María demeurent nimbées de mystère. Elle était probablement d'ascendance espagnole et maure, comme tendent à le montrer ses tatouages au henné et son style vestimentaire.",['force'=>2,'discretion'=>5,'agilite'=>5, 'arme' => 'lame secrète']);
        $p4 = new Personnage(4,'Shao Jun', 21,0,'shao_jun.png',"Shao Jun commença son existence comme concubine et espionne personnelle de l'empereur de Chine Zhengde, à l'époque de la Renaissance. À la mort de l'empereur, une faction des Templiers appelée les Huit Tigres entreprit de prendre le contrôle du pays. Jun fut sauvée par les Assassins et décida, en remerciement, de consacrer sa vie à leur cause.

        Alors que Jun était âgée de dix-neuf ans, les Huit Tigres décidèrent de se débarrasser de tous leurs opposants et elle dut fuir le pays. Elle gagna l'Italie où elle bénéficia de l'aide et des enseignements d'Ezio Auditore, le Mentor des Assassins. Élève assidue qui adorait découvrir de nouvelles cultures et sociétés, Jun parcourut l'Europe afin de poursuivre sa formation.

        Par la suite, Shao Jun retourna en Chine pour affronter les Huit Tigres et reconstituer la Confrérie locale, dont elle devint le Mentor.",['force'=>4,'discretion'=>2,'agilite'=>4, 'arme' => 'épée']);
    }
    public static function getPlayerById($id) {
        foreach (self::$players as $player) {
            if((int)$id === $player->id) {
                return $player;
            }
        }
    }
   
}