<?php

/* Le controlleur Remuneration qui gère les vues et le model des remunération */

class RemunerationController {

    // fonction qui affiche le formulaire d'ajout d'une remuneration
    public function ajoutRemuneration() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] == "Responsable Formation") || ($_SESSION['profile'] == "Responsable Administratif")) {
                $functionUrl = "actionAjoutRemuneration";
                $sub_title = "Ajout d'une rénumeration";
                $mform = new ModelRespFinancier();
                $forms = $mform->getAll();
                $mforms = new ModelContGestion();
                $form = $mforms->getAll();
                include_once VIEWS . DS . 'ajoutRemuneration.php';
            } else {
                header('Location: ' . URL_BASE);
            }
        }
    }

    /* fonction qui met en relation les données du formulaire d'ajout d'une remuneration
     * et la fonction addMatiere() du modèle matiere pour l'ajout 
     */

    public function actionAjoutRemuneration() {
        $dateD = filter_input(INPUT_POST, 'dateD', FILTER_SANITIZE_STRING);
        $dateF = filter_input(INPUT_POST, 'dateF', FILTER_SANITIZE_STRING);
        $controlerId = filter_input(INPUT_POST, 'controleurId', FILTER_SANITIZE_STRING);
        $respFinancierId = filter_input(INPUT_POST, 'respFinId', FILTER_SANITIZE_STRING);
        $m = new ModelRemuneration();
        $m->addRemuneration($dateD, $dateF, $controlerId, $respFinancierId);
        header('Location: ' . URL_BASE . '/Remuneration/listRemunerations');
    }

    /* fonction qui met en relation les données 
     * renvoyées par la fonction getAllMatieres()
     * du modèle matiere 
     * et la vue qui affihe les remunerations
     */

    public function listRemunerations() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] != "Responsable Formation") && ($_SESSION['profile'] != "Responsable Administratif")) {
                $classe = "hide";
            }
            $m = new ModelRemuneration();
            $list = $m->getAllRemunerations();
            include_once VIEWS . DS . 'listRemunerations.php';
        } else {
            include_once VIEWS . DS . 'connexion.php';
        }
    }

    /* fonction qui met en relation les donnéss 
     * renvoyées par la fonction getMatiere()
     * du modèle matiere 
     * et le formulaire pour modifier une remuneration
     */

    public function modifRenumeration() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] == "Responsable Formation") || ($_SESSION['profile'] == "Responsable Administratif")) {

                $id = filter_input(INPUT_GET, 'remunerationId', FILTER_SANITIZE_NUMBER_INT);
                $m = new ModelRemuneration();
                $mat = $m->getRemuneration($id);
                $mform = new ModelRespFinancier();
                $forms = $mform->getAll();
                $mforms = new ModelContGestion();
                $form = $mforms->getAll();
                $functionUrl = "actionModifRemuneration";
                $sub_title = "Modification d'une Remuneration";
                include_once VIEWS . DS . 'ajoutRemuneration.php';
            } else {
                header('Location: ' . URL_BASE);
            }
        }else {
                header('Location: ' . URL_BASE);
            }
    }

    /* fonction qui met en relation les données 
     * renvoyées par le formulaire de modification d'une remuneration
     * et la fonction updateMatiere() du modeèle matiere
     * pour la mise à jour d'une remuneration
     */

    public function actionModifRemuneration() {
        $id = filter_input(INPUT_POST, 'remunerationId', FILTER_SANITIZE_STRING);
        $dateD = filter_input(INPUT_POST, 'dateD', FILTER_SANITIZE_STRING);
        $dateF = filter_input(INPUT_POST, 'dateF', FILTER_SANITIZE_STRING);
        $controlerId = filter_input(INPUT_POST, 'controleurId', FILTER_SANITIZE_STRING);
        $respFinancierId = filter_input(INPUT_POST, 'respFinId', FILTER_SANITIZE_STRING);
        $m = new ModelRemuneration();
        $m->updateRemuneration($id, $dateD, $dateF, $controlerId, $respFinancierId);
        header('Location: ' . URL_BASE . '/Remuneration/listRemunerations');
    }

    /* fonction qui appelle la fonction deleteMatiere()
     * du modèle matiere pour supprimer une remuneration
     */

    public function deleteRemuneration() {
        $id = filter_input(INPUT_GET, 'remunerationId', FILTER_SANITIZE_STRING);
        $m = new ModelRemuneration();
        $m->deleteRemuneration($id);
        header('Location: ' . URL_BASE . '/Remuneration/listRemunerations');
    }

}

?>