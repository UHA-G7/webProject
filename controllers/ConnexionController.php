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

    public function index() {

        include_once VIEWS . DS . 'connexion.php';
    }

    public function doLogin() {
        //Est-ce que les paramètres attendus sont présents?
        if (isset($_POST['login']) && isset($_POST['pwd']) && isset($_POST['profile']) && $_POST['profile'] !== "") {
            //OUI - Filtre les données envoyées par l'utilisateur
            $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
            $mot = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);
            $pwd= sha1($mot);
            $table = filter_input(INPUT_POST, 'profile', FILTER_SANITIZE_STRING);
            
            //Vérification du couple login/password
            $model = 'model' . ucfirst($table);
            $m = new $model();
            $_SESSION['model'] = $model;
            $usr = $m->logincheck($login, $pwd);
            
            if (count($usr) == 1) {
                //le login/password est bon - initialisation d'une variable de session
                switch ($table) {
                    case "RespFormation" :
                        $_SESSION['profile'] = "Responsable Formation";
                        
                        break;
                    case "RespAdministratif" :
                        $_SESSION['profile'] = "Responsable Administratif";
                        break;
                    case "ContGestion" :
                        $_SESSION['profile'] = "Controleur Gestion";
                        break;
                    case "RespFinancier" :
                        $_SESSION['profile'] = "Responsable Financier";
                        break;
                    case "Vacataire" :
                        $_SESSION['profile'] = "Vacataire";
                        break;
                    default:
                        break;
                }
                
                foreach ($usr as $u) {
                    $_SESSION['id'] = $u[0];
                    $_SESSION['nom'] = $u[1];
                    $_SESSION['prenom'] = $u[2];
                }
                $_SESSION['login'] = $login;
                
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
        header('Location: ' . URL_BASE . '/Connexion/index');
    }

    public function updatePwd() {
        if (isset($_SESSION['login']) && isset($_SESSION['model'])) {
            $id = filter_input(INPUT_GET, 'userId', FILTER_SANITIZE_NUMBER_INT);
            $model = $_SESSION['model'];
            $m = new $model();
            $usr = $m->getOne($id);
            include_once VIEWS . DS . 'miseAjourPasse.php';
        } else {
            include_once VIEWS . DS . 'connexion.php';
        }
    }

    public function doUpdatePwd() {
        $id = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_NUMBER_INT);
        $mot = filter_input(INPUT_POST, 'userPwd', FILTER_SANITIZE_STRING);
         $pwd=sha1($mot);
        $mot2 = filter_input(INPUT_POST, 'userPwd2', FILTER_SANITIZE_STRING);
        $pwd2=sha1($mot2);
        if ($pwd == $pwd2) {
            $model = $_SESSION['model'];
            $m = new $model();
            if ($m->updateUserPwd($pwd, $id)) {

                $message = "Mot de passe mis à jour avec succes";
            } else {
                $message = "Echec de mis à jour du mot de passe";
            }
            header('Location: ' . URL_BASE . '/Index/index?msg=' . $message);
        } else {
            $message = "Les deux champs du mot de passe doivent être identiques";
            header('Location: ' . URL_BASE . '/Index/index?msg=' . $message);
        }
    }

}
