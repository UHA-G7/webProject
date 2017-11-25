<?php

/*
 * IndexController est le controlleur par defaut de l'aplication
 * qui permet d'acceder à la page d'accueil de l'appli
 * 
 */
class IndexController{
  
  public function index() {
      if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
          if (($_SESSION['profile'] != "RespFormation") && ($_SESSION['profile'] != "RespAdministratif")) {
                $classe="hide";
            }
            $mfa = new ModelFaculte();
            $mfo = new ModelFormation();
            $mma = new ModelMatiere();
            $nb_fac = count($mfa->getAllFacs());
            $nb_forma = count($mfo->getAllFormations());
            $nb_mat = count($mma->getAllMatieres());
            include VIEWS . DS . 'index.php';
        } else {
            include_once VIEWS . DS . 'connexion.php';
        }
    }

}
?>