<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConnexionController
 *
 * @author boumb
 */
class ConnexionController {

    public function index(){
        
         include_once VIEWS . DS . 'connexion.php';        
    }
    public function doLogin() {
        //Est-ce que les paramètres attendus sont présents?
        if (isset($_POST['login']) && isset($_POST['pwd']) && isset($_POST['profile']) && $_POST['profile']!=="" ) {
            //OUI - Filtre les données envoyées par l'utilisateur
            $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
            $pwd = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);
            $table= filter_input(INPUT_POST, 'profile', FILTER_SANITIZE_STRING);
            //Vérification du couple login/password
            $model='model'.ucfirst($table);
            $m = new $model();
            if ($m->logincheck($login, $pwd)) {
                //le login/password est bon - initialisation d'une variable de session
                $_SESSION['login'] = $login;
                $_SESSION['profile']=$table;
                header('Location: ' . URL_BASE);
            } else {
                //le login/password n'est pas bon
                //On retourne vers la page d'accueil
                header('Location: ' . URL_BASE . '/Connexion/index');
            }
        } else {
            //Les paramètres attendus ne sont pas présents!!
            //addmessage("Tentative de connexion de manière inappropriée!!", 'danger');
            header('Location: ' . URL_BASE . '/Connexion/index');
        }
    }
    public function logout() {
		session_destroy();
		//addmessage("Vous venez d'être déconnecté",'info');
		 header('Location: ' . URL_BASE . '/Connexion/index');
	}
}
