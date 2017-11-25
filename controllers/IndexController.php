<?php

/*
 * IndexController est le controlleur par defaut de l'aplication
 * qui permet d'acceder à la page d'accueil de l'appli
 * 
 */
class IndexController{
  
  public function index() {
      if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
          if (($_SESSION['profile'] != "Responsable Formation") && ($_SESSION['profile'] != "Responsable Administratif")) {
                $classe="hide";
            }
            if (isset($_GET['msg'])) {
                $message = filter_input(INPUT_GET, 'msg', FILTER_SANITIZE_STRING);
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