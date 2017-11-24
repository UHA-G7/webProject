<?php

class RespFormationController {

    // fonction qui affiche le formulaire d'ajout d'un Responsable Formations
    public function add() {
        $mform = new ModelFormation();
        $forms = $mform->getAllFormations();
        $sub_title = "Ajout d'un Responsable Formation";
        $functionUrl = "doAdd";
        include_once VIEWS . DS . 'ajoutRespFormation.php';
    }

    public function doAdd() {
        if (isset($_POST['userNom']) && isset($_POST['userPrenom']) && isset($_POST['userAddr']) &&
                isset($_POST['userPhone']) && isset($_POST['userEmail']) && isset($_POST['userPwd'])) {
            //Nettoyage des paramètres saisis par l'Responsable Formation
            $uNom = filter_input(INPUT_POST, 'userNom', FILTER_SANITIZE_STRING);
            $uPrenom = filter_input(INPUT_POST, 'userPrenom', FILTER_SANITIZE_STRING);
            $uAdresse = filter_input(INPUT_POST, 'userAddr', FILTER_SANITIZE_STRING);
            $uPhone = filter_input(INPUT_POST, 'userPhone', FILTER_SANITIZE_NUMBER_INT);
            $uEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_STRING);
            $uPwd = filter_input(INPUT_POST, 'userPwd', FILTER_SANITIZE_STRING);
            $uFormation = filter_input(INPUT_POST, 'formaId', FILTER_SANITIZE_NUMBER_INT);
            $um = new ModelRespFormation();
            if ($um->add($uNom, $uPrenom, $uAdresse, $uPhone, $uEmail, $uPwd, $uFormation)) {
                $message = "L'Responsable Formation a bien été ajouté en base de données";
                var_dump($message);
            } else {
                $message = "Une erreur n'a pas permis d'ajouter l'Responsable Formation en base de données.";
                var_dump($message);
            }
            header('Location: ' . URL_BASE . '/RespFormation/lists');
        } else {
            //Les paramètres attendus ne sont pas présents!!
            $message = "Tentative d'ajout d'un Responsable Formation mais avec les mauvais paramètres.";
            var_dump($message);
            header('Location: ' . URL_BASE . '/RespFormation/add');
        }
    }

    /* fonction qui met en relation les données 
     * renvoyées par la fonction gettAll()
     * du modèle RespFormation 
     * et la vue qui affihe les Responsable Formations
     */

    public function lists() {
        $m = new ModelRespFormation();
        $list = $m->getAll();
        include_once VIEWS . DS . 'listRespFormations.php';
    }

    /* fonction qui met en relation les donnéss 
     * renvoyées par la fonction getOne()
     * du modèle RespFormation 
     * et le formulaire pour modifier un Responsable Formation
     */

    public function update() {
        $id = filter_input(INPUT_GET, 'userId', FILTER_SANITIZE_NUMBER_INT);
        $m = new ModelRespFormation();
        $resp = $m->getOne($id);
        $mform = new ModelFormation();
        $forms = $mform->getAllFormations();
        $sub_title = "Modification d'un Responsable Formation";
        $functionUrl = "doUpdate";
        include_once VIEWS . DS . 'ajoutRespFormation.php';
    }

    /* fonction qui met en relation les données 
     * renvoyées par le formulaire de modification d'un Responsable Formation
     * et la fonction update() du modeèle Responsable Formation
     * pour la mise à jour d'un Responsable Formation
     */

    public function doUpdate() {
        $id = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_STRING);
        $uNom = filter_input(INPUT_POST, 'userNom', FILTER_SANITIZE_STRING);
        $uPrenom = filter_input(INPUT_POST, 'userPrenom', FILTER_SANITIZE_STRING);
        $uAdresse = filter_input(INPUT_POST, 'userAddr', FILTER_SANITIZE_STRING);
        $uPhone = filter_input(INPUT_POST, 'userPhone', FILTER_SANITIZE_NUMBER_INT);
        $uEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_STRING);
        $uPwd = filter_input(INPUT_POST, 'userPwd', FILTER_SANITIZE_STRING);
        $uFormation = filter_input(INPUT_POST, 'formaId', FILTER_SANITIZE_NUMBER_INT);
        $m = new ModelRespFormation();
        if ($m->update($uNom, $uPrenom, $uAdresse, $uPhone, $uEmail, $uPwd, $uFormation, $id)) {
            $message = "Le Responsable Formation a bien été mise a jour";
            var_dump($message);
        } else {
            $message = "Une erreur n'a pas permis de mettre a jour le Responsable Formation";
            var_dump($message);
          // die();
        }

        header('Location: ' . URL_BASE . '/RespFormation/lists');
    }

    /* fonction qui appelle la fonction deleteRespFormation()
     * du modèle RespFormation pour supprimer un Responsable Formation
     */

    public function delete() {
        $id = filter_input(INPUT_GET, 'userId', FILTER_SANITIZE_STRING);
        $m = new ModelRespFormation();
        $m->delete($id);
        header('Location: ' . URL_BASE . '/RespFormation/lists');
    }

}
