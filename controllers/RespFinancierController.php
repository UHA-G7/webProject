<?php

class RespFinancierController {

    // fonction qui affiche le formulaire d'ajout d'un Responsable Financier
    public function add() {
        $sub_title = "Ajout d'un Responsable Financier";
        $functionUrl = "doAdd";
        include_once VIEWS . DS . 'ajoutRespFinancier.php';
    }

    public function doAdd() {
        if (isset($_POST['userNom']) && isset($_POST['userPrenom']) && isset($_POST['userAddr']) &&
                isset($_POST['userPhone']) && isset($_POST['userEmail']) && isset($_POST['userPwd'])) {
            //Nettoyage des paramètres saisis par l'Responsable Financier
            $uNom = filter_input(INPUT_POST, 'userNom', FILTER_SANITIZE_STRING);
            $uPrenom = filter_input(INPUT_POST, 'userPrenom', FILTER_SANITIZE_STRING);
            $uAdresse = filter_input(INPUT_POST, 'userAddr', FILTER_SANITIZE_STRING);
            $uPhone = filter_input(INPUT_POST, 'userPhone', FILTER_SANITIZE_NUMBER_INT);
            $uEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_STRING);
            $uPwd = filter_input(INPUT_POST, 'userPwd', FILTER_SANITIZE_STRING);
            $um = new ModelRespFinancier();
            if ($um->add($uNom, $uPrenom, $uAdresse, $uPhone, $uEmail, $uPwd)) {
                $message = "Le Responsable Financier a bien été ajouté en base de données";
                var_dump($message);
            } else {
                $message = "Une erreur n'a pas permis d'ajouter le Responsable Financier en base de données.";
                var_dump($message);
            }
            header('Location: ' . URL_BASE . '/RespFinancier/lists');
        } else {
            //Les paramètres attendus ne sont pas présents!!
            $message = "Tentative d'ajout d'un Responsable Financier mais avec les mauvais paramètres.";
            var_dump($message);
            header('Location: ' . URL_BASE . '/RespFinancier/add');
        }
    }

    /* fonction qui met en relation les données 
     * renvoyées par la fonction gettAll()
     * du modèle RespFinancier 
     * et la vue qui affihe les Responsable Financiers
     */

    public function lists() {
        $m = new ModelRespFinancier();
        $list = $m->getAll();
        include_once VIEWS . DS . 'listRespFinanciers.php';
    }

    /* fonction qui met en relation les donnéss 
     * renvoyées par la fonction getOne()
     * du modèle RespFinancier 
     * et le formulaire pour modifier un Responsable Financier
     */

    public function update() {
        $id = filter_input(INPUT_GET, 'userId', FILTER_SANITIZE_NUMBER_INT);
        $m = new ModelRespFinancier();
        $resp = $m->getOne($id);
        $sub_title = "Modification d'un Responsable Financier";
        $functionUrl = "doUpdate";
        include_once VIEWS . DS . 'ajoutRespFinancier.php';
    }

    /* fonction qui met en relation les données 
     * renvoyées par le formulaire de modification d'un Responsable Financier
     * et la fonction update() du modeèle Responsable Financier
     * pour la mise à jour d'un Responsable Financier
     */

    public function doUpdate() {
        $id = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_STRING);
        $uNom = filter_input(INPUT_POST, 'userNom', FILTER_SANITIZE_STRING);
        $uPrenom = filter_input(INPUT_POST, 'userPrenom', FILTER_SANITIZE_STRING);
        $uAdresse = filter_input(INPUT_POST, 'userAddr', FILTER_SANITIZE_STRING);
        $uPhone = filter_input(INPUT_POST, 'userPhone', FILTER_SANITIZE_NUMBER_INT);
        $uEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_STRING);
        $uPwd = filter_input(INPUT_POST, 'userPwd', FILTER_SANITIZE_STRING);
        $m = new ModelRespFinancier();
        if ($m->update($uNom, $uPrenom, $uAdresse, $uPhone, $uEmail, $uPwd, $id)) {
            $message = "Le Responsable Financier a bien été mise a jour";
            var_dump($message);
        } else {
            $message = "Une erreur n'a pas permis de mettre a jour le Responsable Financier";
            var_dump($message);
          //die();
        }

        header('Location: ' . URL_BASE . '/RespFinancier/lists');
    }

    /* fonction qui appelle la fonction deleteRespFinancier()
     * du modèle RespFinancier pour supprimer un Responsable Financier
     */

    public function delete() {
        $id = filter_input(INPUT_GET, 'userId', FILTER_SANITIZE_STRING);
        $m = new ModelRespFinancier();
        $m->delete($id);
        header('Location: ' . URL_BASE . '/RespFinancier/lists');
    }

}
