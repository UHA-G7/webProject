<?php

class RespAdministratifController {

    // fonction qui affiche le formulaire d'ajout d'un Responsable Administratifs
    public function add() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] == "Responsable Formation") || ($_SESSION['profile'] == "Responsable Administratif")) {
                $mform = new ModelFormation();
                $forms = $mform->getAllFormations();
                $sub_title = "Ajout d'un Responsable Administratif";
                $functionUrl = "doAdd";
                include_once VIEWS . DS . 'ajoutRespAdministratif.php';
            } else {
                header('Location: ' . URL_BASE);
            }
        }
    }

    public function doAdd() {
        if (isset($_POST['userNom']) && isset($_POST['userPrenom']) && isset($_POST['userAddr']) &&
                isset($_POST['userPhone']) && isset($_POST['userEmail']) && isset($_POST['userPwd'])) {
            //Nettoyage des paramètres saisis par l'Responsable Administratif
            $uNom = filter_input(INPUT_POST, 'userNom', FILTER_SANITIZE_STRING);
            $uPrenom = filter_input(INPUT_POST, 'userPrenom', FILTER_SANITIZE_STRING);
            $uAdresse = filter_input(INPUT_POST, 'userAddr', FILTER_SANITIZE_STRING);
            $uPhone = filter_input(INPUT_POST, 'userPhone', FILTER_SANITIZE_NUMBER_INT);
            $uEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_STRING);
            $uPwd = filter_input(INPUT_POST, 'userPwd', FILTER_SANITIZE_STRING);
            $uformation = filter_input(INPUT_POST, 'formaId', FILTER_SANITIZE_NUMBER_INT);
            $um = new ModelRespAdministratif();
            if ($um->add($uNom, $uPrenom, $uAdresse, $uPhone, $uEmail, $uPwd, $uformation)) {
                $message = "Le Responsable Administratif a bien été ajouté en base de données";
                var_dump($message);
            } else {
                $message = "Une erreur n'a pas permis d'ajouter le Responsable Administratif en base de données.";
                var_dump($message);
            }
            header('Location: ' . URL_BASE . '/RespAdministratif/lists');
        } else {
            //Les paramètres attendus ne sont pas présents!!
            $message = "Tentative d'ajout d'un Responsable Administratif mais avec les mauvais paramètres.";
            var_dump($message);
            header('Location: ' . URL_BASE . '/RespAdministratif/add');
        }
    }

    /* fonction qui met en relation les données 
     * renvoyées par la fonction gettAll()
     * du modèle RespAdministratif 
     * et la vue qui affihe les Responsable Administratifs
     */

    public function lists() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] != "Responsable Formation") && ($_SESSION['profile'] != "Responsable Administratif")) {
                $classe = "hide";
            }
            $m = new ModelRespAdministratif();
            $mF= new ModelFormation();
            $list = $m->getAll();
            $forma= $mF->getAllFormations();
            include_once VIEWS . DS . 'listRespAdministratifs.php';
        } else {
            include_once VIEWS . DS . 'connexion.php';
        }
    }

    /* fonction qui met en relation les donnéss 
     * renvoyées par la fonction getOne()
     * du modèle RespAdministratif 
     * et le formulaire pour modifier un Responsable Administratif
     */

    public function update() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] == "Responsable Formation") || ($_SESSION['profile'] == "Responsable Administratif")) {

                $id = filter_input(INPUT_GET, 'userId', FILTER_SANITIZE_NUMBER_INT);
                $m = new ModelRespAdministratif();
                $resp = $m->getOne($id);
                $mform = new ModelFormation();
                $forms = $mform->getAllFormations();
                $sub_title = "Modification d'un Responsable Administratif";
                $functionUrl = "doUpdate";
                include_once VIEWS . DS . 'ajoutRespAdministratif.php';
            } else {
                header('Location: ' . URL_BASE);
            }
        } else {
            header('Location: ' . URL_BASE);
        }
    }
    
    /* fonction qui met en relation les données 
     * renvoyées par le formulaire de modification d'un Responsable Administratif
     * et la fonction update() du modeèle Responsable Administratif
     * pour la mise à jour d'un Responsable Administratif
     */

    public function doUpdate() {
        $id = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_STRING);
        $uNom = filter_input(INPUT_POST, 'userNom', FILTER_SANITIZE_STRING);
        $uPrenom = filter_input(INPUT_POST, 'userPrenom', FILTER_SANITIZE_STRING);
        $uAdresse = filter_input(INPUT_POST, 'userAddr', FILTER_SANITIZE_STRING);
        $uPhone = filter_input(INPUT_POST, 'userPhone', FILTER_SANITIZE_NUMBER_INT);
        $uEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_STRING);
        $uPwd = filter_input(INPUT_POST, 'userPwd', FILTER_SANITIZE_STRING);
        $uformation = filter_input(INPUT_POST, 'formaId', FILTER_SANITIZE_NUMBER_INT);
        $m = new ModelRespAdministratif();
        if ($m->update($uNom, $uPrenom, $uAdresse, $uPhone, $uEmail, $uPwd, $uformation, $id)) {
            $message = "Le Responsable Administratif a bien été mise a jour";
            var_dump($message);
        } else {
            $message = "Une erreur n'a pas permis de mettre a jour le Responsable Administratif";
            var_dump($message);
            // die();
        }

        header('Location: ' . URL_BASE . '/RespAdministratif/lists');
    }

    /* fonction qui appelle la fonction deleteRespAdministratif()
     * du modèle RespAdministratif pour supprimer un Responsable Administratif
     */

    public function delete() {
        $id = filter_input(INPUT_GET, 'userId', FILTER_SANITIZE_STRING);
        $m = new ModelRespAdministratif();
        $m->delete($id);
        header('Location: ' . URL_BASE . '/RespAdministratif/lists');
    }

}
