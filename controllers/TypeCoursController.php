<?php

/* Le controlleur type de cours qui gère les vues et le model des types */

class TypeCoursController {

    // fonction qui affiche le formulaire d'ajout d'un type de cours
    public function ajoutTypeCours() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] == "Responsable Formation") || ($_SESSION['profile'] == "Responsable Administratif")) {
                $functionUrl = "actionAjoutTypeCour";
                $sub_title = "Ajout d'un type de cours";
                include_once VIEWS . DS . 'ajoutTypeCours.php';
            } else {
                header('Location: ' . URL_BASE);
            }
        }
    }

    /* fonction qui met en relation les données du formulaire d'ajout d'un type de cours
     * et la fonction addTypeCour() du modèle matiere pour l'ajout 
     */

    public function actionAjoutTypeCour() {
        $libelle = filter_input(INPUT_POST, 'libelle', FILTER_SANITIZE_STRING);
        $prixHeure = filter_input(INPUT_POST, 'prixHeure', FILTER_SANITIZE_STRING);
        $m = new ModelTypeCours();
        $m->addTypeCours($libelle, $prixHeure);
        header('Location: ' . URL_BASE . '/TypeCours/listTypeCours');
    }

    /* fonction qui met en relation les données 
     * renvoyées par la fonction getAllMatieres()
     * du modèle matiere 
     * et la vue qui affihe les matières
     */

    public function listTypeCours() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] != "Responsable Formation") && ($_SESSION['profile'] != "Responsable Administratif")) {
                $classe = "hide";
            }
            $m = new ModelTypeCours();
            $list = $m->getAllTypeCours();
            include_once VIEWS . DS . 'listTypeCours.php';
        } else {
            include_once VIEWS . DS . 'connexion.php';
        }
    }

    /* fonction qui met en relation les donnéss 
     * renvoyées par la fonction getMatiere()
     * du modèle matiere 
     * et le formulaire pour modifier une matière
     */

    public function modifTypeCour() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] == "Responsable Formation") || ($_SESSION['profile'] == "Responsable Administratif")) {

                $id = filter_input(INPUT_GET, 'typeCourId', FILTER_SANITIZE_NUMBER_INT);
                $m = new ModelTypeCours();
                $mat = $m->getTypeCours($id);
                $functionUrl = "actionModifTypeCour";
                $sub_title = "Modification d'un type de cours";
                include_once VIEWS . DS . 'ajoutTypeCour.php';
            } else {
                header('Location: ' . URL_BASE);
            }
        }else {
                header('Location: ' . URL_BASE);
            }
    }

    /* fonction qui met en relation les données 
     * renvoyées par le formulaire de modification d'une matière
     * et la fonction updateMatiere() du modeèle matiere
     * pour la mise à jour d'une matière
     */

    public function actionModifTypeCour() {
        $id = filter_input(INPUT_POST, 'typeCourId', FILTER_SANITIZE_STRING);
        $libelle = filter_input(INPUT_POST, 'libelle', FILTER_SANITIZE_STRING);
        $prixHeure = filter_input(INPUT_POST, 'prixHeure', FILTER_SANITIZE_STRING);
        $m = new ModelTypeCours();
        $m->updateTypeCours($id, $libelle, $prixHeure);
        header('Location: ' . URL_BASE . '/TypeCours/listTypeCours');
    }

    /* fonction qui appelle la fonction deleteMatiere()
     * du modèle matiere pour supprimer une matière
     */

    public function deleteTypeCour() {
        $id = filter_input(INPUT_GET, 'typeCoursId', FILTER_SANITIZE_STRING);
        $m = new ModelTypeCours();
        $m->deleteTypeCours($id);
        header('Location: ' . URL_BASE . '/TypeCours/listTypeCours');
    }

}

?>