<?php

/* Le controlleur cours qui gère les vues et le model des cours */

class CoursController {

    // fonction qui affiche le formulaire d'ajout d'un cours
    public function ajoutCours() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] == "Responsable Formation") || ($_SESSION['profile'] == "Responsable Administratif")) {
                $functionUrl = "actionAjoutCours";
                $sub_title = "Ajout d'un cours";
                $mform = new ModelMatiere();
                $forms = $mform->getAllMatieres();
                $mform = new ModelTypeCours();
                $forms1 = $mform->getAllTypeCours();
                $mform = new modelVacataire();
                $forms2 = $mform->getAll();
                $mform = new modelRespAdministratif();
                $forms3 = $mform->getAll();
                $mform = new ModelRemuneration();
                $forms4 = $mform->getAllRemunerations();
                include_once VIEWS . DS . 'ajoutCours.php';
            } else {
                header('Location: ' . URL_BASE);
            }
        }
    }

    /* fonction qui met en relation les données du formulaire d'ajout d'une matière
     * et la fonction addMatiere() du modèle matiere pour l'ajout 
     */

    public function actionAjoutCours() {
        $courDate = filter_input(INPUT_POST, 'courDate', FILTER_SANITIZE_STRING);
        $courDuree = filter_input(INPUT_POST, 'courduree', FILTER_SANITIZE_STRING);
        $courHD = filter_input(INPUT_POST, 'courHD', FILTER_SANITIZE_STRING);
        $respAminId = filter_input(INPUT_POST, 'respAdminId', FILTER_SANITIZE_STRING);
        $vacataireId = filter_input(INPUT_POST, 'vacataireId', FILTER_SANITIZE_STRING);
        $typeId = filter_input(INPUT_POST, 'typeCourId', FILTER_SANITIZE_STRING);
        $remunerationid = filter_input(INPUT_POST, 'remunerationId', FILTER_SANITIZE_STRING);
        $matiereId = filter_input(INPUT_POST, 'matiereId', FILTER_SANITIZE_STRING);

        $m = new ModelCours();
        $m->addCours($courDate, $courDuree, $courHD, $respAminId, $vacataireId, $typeId, $remunerationid, $matiereId);
        header('Location: ' . URL_BASE . '/Cours/listCours');
    }

    /* fonction qui met en relation les données 
     * renvoyées par la fonction getAllMatieres()
     * du modèle matiere 
     * et la vue qui affihe les matières
     */

    public function listCours() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] != "Responsable Formation") && ($_SESSION['profile'] != "Responsable Administratif")) {
                $classe = "hide";
            }
            $m = new ModelCours();
            $list = $m->getAllCours();
            $m_Mat = new ModelMatiere();
            $mats = $m_Mat->getAllMatieres();
            $m_vac= new ModelVacataire();
            $vacs=$m_vac->getAll();
            $m_Tcours=new ModelTypeCours();
            $types= $m_Tcours->getAllTypeCours();
            include_once VIEWS . DS . 'listCours.php';
        } else {
            include_once VIEWS . DS . 'connexion.php';
        }
    }

    /* fonction qui met en relation les donnéss 
     * renvoyées par la fonction getMatiere()
     * du modèle matiere 
     * et le formulaire pour modifier une matière
     */

    public function modifCours() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] == "Responsable Formation") || ($_SESSION['profile'] == "Responsable Administratif")) {

                $id = filter_input(INPUT_GET, 'coursId', FILTER_SANITIZE_NUMBER_INT);
                $m = new ModelCours();
                $mat = $m->getCours($id);
                $mform = new ModelMatiere();
                $forms = $mform->getAllMatieres();
                $mform = new ModelTypeCours();
                $forms1 = $mform->getAllTypeCours();
                $mform = new modelVacataire();
                $forms2 = $mform->getAll();
                $mform = new modelRespAdministratif();
                $forms3 = $mform->getAll();
                $mform = new ModelRemuneration();
                $forms4 = $mform->getAllRemunerations();
                $functionUrl = "actionModifCour";
                $sub_title = "Modification d'un cours";
                include_once VIEWS . DS . 'ajoutCours.php';
            } else {
                header('Location: ' . URL_BASE);
            }
        } else {
            header('Location: ' . URL_BASE);
        }
    }

    /* fonction qui met en relation les données 
     * renvoyées par le formulaire de modification d'une matière
     * et la fonction updateMatiere() du modeèle matiere
     * pour la mise à jour d'une matière
     */

    public function actionModifCour() {
        $id = filter_input(INPUT_POST, 'courId', FILTER_SANITIZE_STRING);
        $courDate = filter_input(INPUT_POST, 'courDate', FILTER_SANITIZE_STRING);
        $courDuree = filter_input(INPUT_POST, 'courduree', FILTER_SANITIZE_STRING);
        $courHD = filter_input(INPUT_POST, 'courHD', FILTER_SANITIZE_STRING);
        $respAminId = filter_input(INPUT_POST, 'respAdminId', FILTER_SANITIZE_STRING);
        $vacataireId = filter_input(INPUT_POST, 'vacataireId', FILTER_SANITIZE_STRING);
        $typeId = filter_input(INPUT_POST, 'typeCourId', FILTER_SANITIZE_STRING);
        $remunerationid = filter_input(INPUT_POST, 'remunerationId', FILTER_SANITIZE_STRING);
        $matiereId = filter_input(INPUT_POST, 'matiereId', FILTER_SANITIZE_STRING);

        $m = new ModelCours();
        $m->updateCours($id, $courDate, $courDuree, $courHD, $respAminId, $vacataireId, $typeId, $remunerationid, $matiereId);
        header('Location: ' . URL_BASE . '/Cours/listCours');
    }

    /* fonction qui appelle la fonction deleteMatiere()
     * du modèle matiere pour supprimer une matière
     */

    public function deleteCours() {

        $id = filter_input(INPUT_GET, 'CoursId', FILTER_SANITIZE_STRING);
        $m = new ModelCours();
        $m->deleteCours($id);
        header('Location: ' . URL_BASE . '/Cours/listCours');
    }

}

?>