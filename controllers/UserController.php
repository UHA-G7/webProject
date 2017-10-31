<?php

class UserController {

    // fonction qui affiche le formulaire d'ajout d'une matière
    public function ajoutUser() {
        $mform = new ModelFormation();
        $forms = $mform->getAllFormations();
        include_once VIEWS . DS . 'ajoutUser.php';
    }

}

?>