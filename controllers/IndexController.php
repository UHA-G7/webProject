<?php

/*
 * IndexController est le controlleur par defaut de l'aplication
 * qui permet d'acceder à la page d'accueil de l'appli
 * 
 */
class IndexController{
  
  public function index() {
      $mfa= new ModelFaculte();
      $mfo= new ModelFormation();
      $mma= new ModelMatiere();
      $nb_fac= count($mfa->getAllFacs());
      $nb_forma= count($mfo->getAllFormations());
      $nb_mat= count($mma->getAllMatieres());
      include VIEWS.DS.'index.php';
  }

}
?>