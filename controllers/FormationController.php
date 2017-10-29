<?php

/* Le controlleur formation qui gère les vues et le model des formation */

class FormationController {

    public function ajoutFormation() {
        $act = "add";
        $mfac = new ModelFaculte();
        $facs = $mfac->getAllFacs();
        include_once VIEWS . DS . 'ajoutformation.php';
    }

    /* fonction qui met en relation les données du formulaire d'ajout d'une formation
     * et la fonction addFormation() du modèle formation pour l'ajout 
     */

    public function actionAjoutFormation() {
        $nom = filter_input(INPUT_POST, 'formaNom', FILTER_SANITIZE_STRING);
        $facId = filter_input(INPUT_POST, 'facId', FILTER_SANITIZE_STRING);
        $m = new ModelFormation();
        $m->addFormation($nom, $facId);
        header('Location: ' . URL_BASE . '/Formation/listFormations');
    }

    /* fonction qui met en relation les données 
     * renvoyées par la fonction getAllFormations()
     * du modèle formation 
     * et la vue qui affihe les formations
     */

    public function listFormations() {
        $m = new ModelFormation();
        $list = $m->getAllFormations();
        include_once VIEWS . DS . 'listformations.php';
    }

    /* fonction qui met en relation les donnéss 
     * renvoyées par la fonction getFormation()
     * du modèle formation 
     * et le formulaire pour modifier une formation
     */

    public function modiFormation() {
        $id = filter_input(INPUT_GET, 'formaId', FILTER_SANITIZE_NUMBER_INT);
        $m = new ModelFormation();
        $form = $m->getFormation($id);
        $mfac = new ModelFaculte();
        $facs = $mfac->getAllFacs();
        $act = "modif";
        include_once VIEWS . DS . 'ajoutFormation.php';
    }

    /* fonction qui met en relation les données 
     * renvoyées par le formulaire de modification d'une formation
     * et la fonction updateFormation() du modeèle formation
     * pour la mise à jour d'une formation
     */

    public function actionModiFormation() {
        $id = filter_input(INPUT_POST, 'formaId', FILTER_SANITIZE_STRING);
        $nom = filter_input(INPUT_POST, 'formaNom', FILTER_SANITIZE_STRING);
        $facId = filter_input(INPUT_POST, 'facId', FILTER_SANITIZE_STRING);
        $m = new ModelFormation();
        $m->updateFormation($id, $nom, $facId);
        header('Location: ' . URL_BASE . '/Formation/listFormations');
    }

    /* fonction qui appelle la fonction deleteFormation()
     * du modèle matiere pour supprimer une matière
     */

    public function deleteFormation() {
        $id = filter_input(INPUT_GET, 'formaId', FILTER_SANITIZE_STRING);
        $m = new ModelFormation();
        $m->deleteFormation($id);
        header('Location: ' . URL_BASE . '/Formation/listFormations');
    }

}

?>