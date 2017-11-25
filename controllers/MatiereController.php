<?php

/* Le controlleur matiere qui gère les vues et le model des matières */

class MatiereController {

    // fonction qui affiche le formulaire d'ajout d'une matière
    public function ajoutMatiere() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] == "Responsable Formation") || ($_SESSION['profile'] == "Responsable Administratif")) {
                $functionUrl = "actionAjoutMatiere";
                $sub_title = "Ajout d'une matière";
                $mform = new ModelFormation();
                $forms = $mform->getAllFormations();
                include_once VIEWS . DS . 'ajoutMatiere.php';
            } else {
                header('Location: ' . URL_BASE);
            }
        }
    }

    /* fonction qui met en relation les données du formulaire d'ajout d'une matière
     * et la fonction addMatiere() du modèle matiere pour l'ajout 
     */

    public function actionAjoutMatiere() {
        $nom = filter_input(INPUT_POST, 'matNom', FILTER_SANITIZE_STRING);
        $formaId = filter_input(INPUT_POST, 'formaId', FILTER_SANITIZE_STRING);
        $m = new ModelMatiere();
        $m->addMatiere($nom, $formaId);
        header('Location: ' . URL_BASE . '/Matiere/listMatieres');
    }

    /* fonction qui met en relation les données 
     * renvoyées par la fonction getAllMatieres()
     * du modèle matiere 
     * et la vue qui affihe les matières
     */

    public function listMatieres() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] != "Responsable Formation") && ($_SESSION['profile'] != "Responsable Administratif")) {
                $classe = "hide";
            }
            $m = new ModelMatiere();
            $list = $m->getAllMatieres();
            include_once VIEWS . DS . 'listMatieres.php';
        } else {
            include_once VIEWS . DS . 'connexion.php';
        }
    }

    /* fonction qui met en relation les donnéss 
     * renvoyées par la fonction getMatiere()
     * du modèle matiere 
     * et le formulaire pour modifier une matière
     */

    public function modifMatiere() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] == "Responsable Formation") || ($_SESSION['profile'] == "Responsable Administratif")) {

                $id = filter_input(INPUT_GET, 'matId', FILTER_SANITIZE_NUMBER_INT);
                $m = new ModelMatiere();
                $mat = $m->getMatiere($id);
                $mform = new ModelFormation();
                $forms = $mform->getAllFormations();
                $functionUrl = "actionModifMatiere";
                $sub_title = "Modification d'une matière";
                include_once VIEWS . DS . 'ajoutMatiere.php';
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

    public function actionModifMatiere() {
        $id = filter_input(INPUT_POST, 'matId', FILTER_SANITIZE_STRING);
        $nom = filter_input(INPUT_POST, 'matNom', FILTER_SANITIZE_STRING);
        $formaId = filter_input(INPUT_POST, 'formaId', FILTER_SANITIZE_STRING);
        $m = new ModelMatiere();
        $m->updateMatiere($id, $nom, $formaId);
        header('Location: ' . URL_BASE . '/Matiere/listMatieres');
    }

    /* fonction qui appelle la fonction deleteMatiere()
     * du modèle matiere pour supprimer une matière
     */

    public function deleteMatiere() {
        $id = filter_input(INPUT_GET, 'matId', FILTER_SANITIZE_STRING);
        $m = new ModelMatiere();
        $m->deleteMatiere($id);
        header('Location: ' . URL_BASE . '/Matiere/listMatieres');
    }

}

?>