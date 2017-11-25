<?php

/* Le controlleur faculté qui gère les vues et le model des facultés */

class FaculteController {

    // fonction qui affiche le formulaire d'ajout d'une faculté
    public function ajoutFaculte() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] == "Responsable Formation") || ($_SESSION['profile'] == "Responsable Administratif")) {
                $sub_title = "Ajout d'une faculté";
                $functionUrl = "actionAjoutFaculte";
                include_once VIEWS . DS . 'ajoutFaculte.php';
            } else {
                header('Location: ' . URL_BASE);
            }
        }
    }

    /* fonction qui met en relation les données du formulaire d'ajout d'une faculté
     * et la fonction addFacc() du model faculté pour l'ajout 
     */

    public function actionAjoutFaculte() {
        $nom = filter_input(INPUT_POST, 'facNom', FILTER_SANITIZE_STRING);
        echo $nom . "857";
        $m = new ModelFaculte();
        $m->addFac($nom);
        header('Location: ' . URL_BASE . '/Faculte/listFacultes');
    }

    /* fonction qui met en relation les données 
     * renvoyées par la fonction gettAllfacs()
     * du modèle facuté 
     * et la vue qui affihe les facultés
     */

    public function listFacultes() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] != "Responsable Formation") && ($_SESSION['profile'] != "Responsable Administratif")) {
                $classe = "hide";
            }
            $m = new ModelFaculte();
            $list = $m->getAllFacs();
            include_once VIEWS . DS . 'listFacultes.php';
        } else {
            include_once VIEWS . DS . 'connexion.php';
        }
    }

    /* fonction qui met en relation les donnéss 
     * renvoyées par la fonction getFaculté()
     * du modèle facuté 
     * et le formulaire pour modifier une faculté
     */

    public function modiFaculte() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] == "Responsable Formation") || ($_SESSION['profile'] == "Responsable Administratif")) {

                $id = filter_input(INPUT_GET, 'facId', FILTER_SANITIZE_NUMBER_INT);
                $m = new ModelFaculte();
                $fac = $m->getFaculte($id);
                $sub_title = "Modification d'une faculté";
                $functionUrl = "actionModiFaculte";
                include_once VIEWS . DS . 'ajoutFaculte.php';
            } else {
                header('Location: ' . URL_BASE);
            }
        }else {
                header('Location: ' . URL_BASE);
            }
    }

    /* fonction qui met en relation les données 
     * renvoyées par le formulaire de modification d'une faculté
     * et la fonction updateFaculté() du modeèle faculté
     * pour la mise à jour d'une faculté
     */

    public function actionModiFaculte() {
        $id = filter_input(INPUT_POST, 'facId', FILTER_SANITIZE_STRING);
        $nom = filter_input(INPUT_POST, 'facNom', FILTER_SANITIZE_STRING);
        $m = new ModelFaculte();
        $m->updateFaculte($nom, $id);
        header('Location: ' . URL_BASE . '/Faculte/listFacultes');
    }

    /* fonction qui appelle la fonction deleteFaculte()
     * du modèle facuté pour supprimer une faculté
     */

    public function deleteFaculte() {
        $id = filter_input(INPUT_GET, 'facId', FILTER_SANITIZE_STRING);
        $m = new ModelFaculte();
        $m->deleteFaculte($id);
        header('Location: ' . URL_BASE . '/Faculte/listFacultes');
    }

}

?>