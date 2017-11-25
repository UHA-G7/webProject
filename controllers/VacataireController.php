<?php

class VacataireController {

    // fonction qui affiche le formulaire d'ajout d'une matière
    public function ajoutVacataire() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] == "Responsable Formation") || ($_SESSION['profile'] == "Responsable Administratif")) {
                $sub_title = "Ajout d'un vacataire";
                $functionUrl = "doAddVacataire";
                include_once VIEWS . DS . 'ajoutVacataire.php';
            } else {
                header('Location: ' . URL_BASE);
            }
        }
    }

    public function doAddVacataire() {
        if (isset($_POST['userNom']) && isset($_POST['userPrenom']) &&
                isset($_POST['userAddr']) && isset($_POST['userEmp']) &&
                isset($_POST['userPhone']) && isset($_POST['userEmail']) && isset($_POST['userPwd'])) {
            //Nettoyage des paramètres saisis par l'vacataire

            $uNom = filter_input(INPUT_POST, 'userNom', FILTER_SANITIZE_STRING);
            $uPrenom = filter_input(INPUT_POST, 'userPrenom', FILTER_SANITIZE_STRING);
            $uAdresse = filter_input(INPUT_POST, 'userAddr', FILTER_SANITIZE_STRING);
            $uPhone = filter_input(INPUT_POST, 'userPhone', FILTER_SANITIZE_NUMBER_INT);
            $uEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_STRING);
            $uPwd = filter_input(INPUT_POST, 'userPwd', FILTER_SANITIZE_STRING);
            $uEmp = filter_input(INPUT_POST, 'userEmp', FILTER_SANITIZE_STRING);
            $um = new ModelVacataire();
            if ($um->add($uNom, $uPrenom, $uAdresse, $uPhone, $uEmp, $uEmail, $uPwd)) {
                $message = "L'vacataire a bien été ajouté en base de données";
            } else {
                $message = "Une erreur n'a pas permis d'ajouter le vacataire en base de données.";
            }
            header('Location: ' . URL_BASE . '/Vacataire/listVacataires');
        } else {
            //Les paramètres attendus ne sont pas présents!!
            $message = "Tentative d'ajout d'un vacataire mais avec les mauvais paramètres.";
            header('Location: ' . URL_BASE . '/Vacataire/ajoutVacataire?msg=' . $message);
        }
    }

    /* fonction qui met en relation les données 
     * renvoyées par la fonction gettAllfacs()
     * du modèle facuté 
     * et la vue qui affihe les vacataires
     */

    public function listVacataires() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] != "Responsable Formation") && ($_SESSION['profile'] != "Responsable Administratif")) {
                $classe = "hide";
            }
            $m = new ModelVacataire();
            $list = $m->getAll();
            include_once VIEWS . DS . 'listVacataires.php';
        } else {
            include_once VIEWS . DS . 'connexion.php';
        }
    }

    /* fonction qui met en relation les donnéss 
     * renvoyées par la fonction getVacataire()
     * du modèle facuté 
     * et le formulaire pour modifier un vacataire
     */

    public function modifVacataire() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] == "Responsable Formation") || ($_SESSION['profile'] == "Responsable Administratif")) {
                $id = filter_input(INPUT_GET, 'vacId', FILTER_SANITIZE_NUMBER_INT);
                $tableName = filter_input(INPUT_GET, 'profile', FILTER_SANITIZE_STRING);
                $m = new ModelVacataire();
                $vac = $m->getOne($id);
                $sub_title = "Modification d'un vacataire";
                $functionUrl = "actionModifVacataire";
                include_once VIEWS . DS . 'ajoutVacataire.php';
            } else {
                header('Location: ' . URL_BASE);
            }
        }else {
                header('Location: ' . URL_BASE);
            }
    }

    /* fonction qui met en relation les données 
     * renvoyées par le formulaire de modification d'un vacataire
     * et la fonction updateVacataire() du modeèle vacataire
     * pour la mise à jour d'un vacataire
     */

    public function actionModifVacataire() {
        $id = filter_input(INPUT_POST, 'vacId', FILTER_SANITIZE_STRING);
        $uNom = filter_input(INPUT_POST, 'userNom', FILTER_SANITIZE_STRING);
        $uPrenom = filter_input(INPUT_POST, 'userPrenom', FILTER_SANITIZE_STRING);
        $uAdresse = filter_input(INPUT_POST, 'userAddr', FILTER_SANITIZE_STRING);
        $uPhone = filter_input(INPUT_POST, 'userPhone', FILTER_SANITIZE_NUMBER_INT);
        $uEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_STRING);
        $uPwd = filter_input(INPUT_POST, 'userPwd', FILTER_SANITIZE_STRING);
        $uEmp = filter_input(INPUT_POST, 'userEmp', FILTER_SANITIZE_STRING);
        $m = new ModelVacataire();
        $m->update($uNom, $uPrenom, $uAdresse, $uPhone, $uEmp, $uEmail, $uPwd, $id);
        header('Location: ' . URL_BASE . '/Vacataire/listVacataires');
    }

    /* fonction qui appelle la fonction deleteVacataire()
     * du modèle facuté pour supprimer un vacataire
     */

    public function deleteVacataire() {
        $id = filter_input(INPUT_GET, 'vacId', FILTER_SANITIZE_STRING);
        $m = new ModelVacataire();
        $m->delete($id);
        header('Location: ' . URL_BASE . '/Vacataire/listVacataires');
    }

}
