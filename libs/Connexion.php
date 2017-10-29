<?php

class Connexion {

    private static $bdd;

    private function __construct() {

        try {
            self::$bdd = new PDO('mysql:host=localhost;dbname=pweb;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public static function getInstance(){
        if(empty(self::$bdd))
            $c= new Connexion ();
        return self::$bdd;
        
    }
    
}
?>