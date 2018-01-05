<?php

class Connexion {

    private static $bdd;

    private function __construct() {

        try {
            self::$bdd = new PDO('mysql:host=localhost;dbname=webproject;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public static function getInstance(){
        if(empty(self::$bdd))
            $c= new Connexion ();
        return self::$bdd;
        
    }
    public static function chaine_aleatoire($nb_car=8, $chaine = 'azertyuiopqsdfghjklmwxcvbn123456789$#@!+-=/') {
		// Génération d'une chaine aléatoire
		$nb_lettres = strlen($chaine) - 1;
		$generation = '';
		for($i=0; $i < $nb_car; $i++){
			$pos = mt_rand(0, $nb_lettres);
			$car = $chaine[$pos];
			$generation .= $car;
		}
		return $generation;
	}
}
?>