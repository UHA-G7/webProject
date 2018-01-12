<?php

class DocumentsController {

    // fonction qui affiche le formulaire d'ajout d'un document
    public function add() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] == "Responsable Formation") || ($_SESSION['profile'] == "Vacataire") || ($_SESSION['profile'] == "Responsable Administratif")) {
                $sub_title = "Ajout d'un document";
                $functionUrl = "doAdd";
                $mvac = new modelVacataire();
                $vacs = $mvac->getAll();

                include_once VIEWS . DS . 'ajoutDocument.php';
            } else {
                header('Location: ' . URL_BASE);
            }
        }
    }

    public function doAdd() {

        if (isset($_POST['docNom']) && isset($_FILES['document']) && $_FILES['document']['error'] == 0 && isset($_POST['vacId'])) {
            $errors = array();
            $file_name = $_FILES['document']['name'];
            $file_size = $_FILES['document']['size'];
            $file_tmp = $_FILES['document']['tmp_name'];
            $info = new SplFileInfo($file_name);
            $file_ext = $info->getExtension();
            $extensions = array("jpeg", "jpg", "png", "pdf");

            if (in_array($file_ext, $extensions) === false) {
                $errors[] = "Seuls les fichier de type  JPEG, PNG ou PDF sont autorisés.";
            }

            if ($file_size > 2097152) {
                $errors[] = 'La taille du fichier ne doit pas dépqsser 2 MB';
            }

            if (empty($errors) == true) {
                if (move_uploaded_file($file_tmp, "../assets/documents/" . $file_name)) {

                    echo "Le fichier a été uploader avec succès";
                } else {
                    echo "Erreur d'upload du fichier";
                }
            } else {
                print_r($errors);
            }
            //Nettoyage des paramètres saisis par l'document
            $dNom = filter_input(INPUT_POST, 'docNom', FILTER_SANITIZE_STRING);
            $dUrl = $file_name;
            $vac = filter_input(INPUT_POST, 'vacId', FILTER_SANITIZE_STRING);

            $um = new ModelDocument();
            if ($um->add($dNom, $dUrl, $vac)) {
                $message = "Le document a bien été ajouté en base de données";
                var_dump($message);
            } else {
                $message = "Une erreur n'a pas permis d'ajouter le document en base de données.";
                var_dump($message);
            }
            if ($_SESSION['profile'] == "Vacataire") {
                header('Location: ' . URL_BASE . '/Documents/documentsVacataire?id=' . $_SESSION['id']);
            } else {
                header('Location: ' . URL_BASE . '/Documents/lists');
            }
        } else {
            //Les paramètres attendus ne sont pas présents!!
            $message = "Tentative d'ajout d'un document mais avec les mauvais paramètres.";
            var_dump($message);
            header('Location: ' . URL_BASE . '/Documents/add');
        }
    }

    /* fonction qui met en relation les données 
     * renvoyées par la fonction gettAll()
     * du modèle Document
     * et la vue qui affihe les documents
     */

    public function lists() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] != "Responsable Formation") && ($_SESSION['profile'] != "Responsable Administratif")) {
                $classe = "hide";
            }
            $m = new ModelDocument();

            $list = $m->getAll();
            $mv = new ModelVacataire();
            $vacs = $mv->getAll();
            include_once VIEWS . DS . 'listDocuments.php';
        } else {
            include_once VIEWS . DS . 'connexion.php';
        }
    }

    public function documentsVacataire() {
        if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
            if (($_SESSION['profile'] != "Responsable Formation") && ($_SESSION['profile'] != "Vacataire") && ($_SESSION['profile'] != "Responsable Administratif")) {
                $classe = "hide";
            }
            $id = filter_input(INPUT_GET, 'vacid', FILTER_SANITIZE_STRING);
            $m = new ModelDocument();
            $list = $m->getDocsByVacataire($id);
            $mv = new ModelVacataire();
            $vacs = $mv->getAll();
            include_once VIEWS . DS . 'listDocuments.php';
        } else {
            include_once VIEWS . DS . 'connexion.php';
        }
    }

    /* fonction qui met en relation les donnéss 
     * renvoyées par la fonction getOne()
     * du modèle Documents 
     * et le formulaire pour modifier un document
     */

    /* public function update() {
      if (isset($_SESSION['login']) && isset($_SESSION['profile'])) {
      if (($_SESSION['profile'] == "Responsable Formation") || ($_SESSION['profile'] != "Vacataire") || ($_SESSION['profile'] == "Responsable Administratif")) {
      $id = filter_input(INPUT_GET, 'docId', FILTER_SANITIZE_NUMBER_INT);
      $m = new ModelDocument();
      $doc = $m->getOne($id);
      $mv= new ModelVacataire();
      $vacs=$mv->getAll();
      $sub_title = "Modification d'un document";
      $functionUrl = "doUpdate";
      include_once VIEWS . DS . 'ajoutDocument.php';
      } else {
      header('Location: ' . URL_BASE);
      }
      } else {
      header('Location: ' . URL_BASE);
      }
      } */

    /* fonction qui met en relation les données 
     * renvoyées par le formulaire de modification d'un document
     * et la fonction update() du modeèle document
     * pour la mise à jour d'un document
     */

    /* public function doUpdate() {
      $id = filter_input(INPUT_POST, 'documentId', FILTER_SANITIZE_STRING);
      $dNom = filter_input(INPUT_POST, 'libelle', FILTER_SANITIZE_STRING);
      $dUrl = filter_input(INPUT_POST, 'documentUrl', FILTER_SANITIZE_STRING);
      $vac = filter_input(INPUT_POST, 'vacataireId', FILTER_SANITIZE_STRING);
      $m = new ModelDocument();
      if ($m->update($dNom, $dUrl, $vac, $id)) {
      $message = "Le document a bien été mise a jour";
      var_dump($message);
      } else {
      $message = "Une erreur n'a pas permis de mettre a jour le document";
      var_dump($message);
      //die();
      }

      header('Location: ' . URL_BASE . '/Documents/lists');
      } */

    /* fonction qui appelle la fonction deleteDocuments()
     * du modèle Documents pour supprimer un document
     */

    public function delete() {
        $id = filter_input(INPUT_GET, 'docId', FILTER_SANITIZE_STRING);
        $m = new ModelDocument();
        $m->delete($id);
        if ($_SESSION['profile'] == "Vacataire") {
            header('Location: ' . URL_BASE . '/Documents/documentsVacataire?id=' . $_SESSION['id']);
        } else {
            header('Location: ' . URL_BASE . '/Documents/lists');
        }
    }

}
