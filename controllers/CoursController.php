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
                include_once VIEWS . DS . 'ajoutCours.php';
            } else {
                header('Location: ' . URL_BASE);
            }
        }
    }

    /* fonction qui met en relation les données du formulaire d'ajout d'un Cours
     * et la fonction addCours() du modèle Cours pour l'ajout 
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
     * renvoyées par la fonction getAllCours()
     * du modèle Cours 
     * et la vue qui affihe les Cours
     */

    public function listCours() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] != "Responsable Formation") && ($_SESSION['profile'] != "Responsable Administratif")) {
                $classe = "hide";
            }
            $m = new ModelCours();
            $list = $m->getAllCours();
            $m_forms= new ModelFormation();
            $forms= $m_forms->getAllFormations();
            $m_resPform=new ModelRespAdministratif();
            $resps= $m_resPform->getAll();
            $m_Mat = new ModelMatiere();
            $mats = $m_Mat->getAllMatieres();
            $m_vac = new ModelVacataire();
            $vacs = $m_vac->getAll();
            $m_Tcours = new ModelTypeCours();
            $types = $m_Tcours->getAllTypeCours();
            include_once VIEWS . DS . 'listCours.php';
        } else {
            include_once VIEWS . DS . 'connexion.php';
        }
    }

    public function coursByVacataire() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] != "Responsable Formation") && ($_SESSION['profile'] != "Responsable Administratif")) {
                $classe = "hide";
            }
            $id = filter_input(INPUT_GET, 'vacid', FILTER_SANITIZE_NUMBER_INT);
            $m = new ModelCours();
            $m_forms= new ModelFormation();
            $forms= $m_forms->getAllFormations();
            $m_resPform=new ModelRespAdministratif();
            $resps= $m_resPform->getAll();
            $list = $m->getCoursByVac($id);
            $m_Mat = new ModelMatiere();
            $mats = $m_Mat->getAllMatieres();
            $m_vac = new ModelVacataire();
            $vacs = $m_vac->getAll();
            $m_Tcours = new ModelTypeCours();
            $types = $m_Tcours->getAllTypeCours();
            include_once VIEWS . DS . 'listCours.php';
        } else {
            include_once VIEWS . DS . 'connexion.php';
        }
    }

    /* fonction qui met en relation les donnéss 
     * renvoyées par la fonction getCours()
     * du modèle Cours 
     * et le formulaire pour modifier un Cours
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
     * renvoyées par le formulaire de modification d'un Cours
     * et la fonction updateCours() du modeèle Cours
     * pour la mise à jour d'un Cours
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

    /* fonction qui appelle la fonction deleteCours()
     * du modèle Cours pour supprimer un Cours
     */

    public function deleteCours() {

        $id = filter_input(INPUT_GET, 'CoursId', FILTER_SANITIZE_STRING);
        $m = new ModelCours();
        $m->deleteCours($id);
        header('Location: ' . URL_BASE . '/Cours/listCours');
    }

    public function validerCours() {

        $id = filter_input(INPUT_GET, 'CoursId', FILTER_SANITIZE_STRING);
        $m = new ModelCours();
        $m->validerCours($id);
        header('Location: ' . URL_BASE . '/Cours/listCours');
    }

    public function payerCours() {

        $id = filter_input(INPUT_GET, 'CoursId', FILTER_SANITIZE_STRING);
        $m = new ModelCours();
        $m->payerCours($id);
        header('Location: ' . URL_BASE . '/Cours/listCours');
    }

}

?>