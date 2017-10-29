<?php

/*Model qui gère:
 *  l'ajout
 *  la suppression
 *  la modification
 *  la selection des formations d'une faculté
 */

class ModelFormation {
    // fonction qui ajoute une formation dans la base de données
    public function addFormation($nom, $facId) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('INSERT INTO formation (formationNom, faculteId ) VALUES (:nom, :faculte)');
        $req->execute(array(
            'nom' => $nom,
            'faculte' => $facId
        ));
    }
    // fonction qui renvoie toutes les formations de la base de données
    public function getAllFormations() {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare("SELECT * FROM formation ORDER BY formationNom ASC");
        $req->execute();
        $forms = $req->fetchAll();
        return $forms;
    }
    // fonction qui renvoi une formation de la base de données
    public function getFormation($id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare("SELECT * FROM formation WHERE formationId= :id ");
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();
        $form = $req->fetchAll();
        return $form;
    }
     // fonction qui modifie les informations d'une formation
    public function updateFormation($id, $nom, $facId) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('UPDATE formation SET formationNom = :nom, faculteId = :facId  WHERE formationId = :id');
        $req->execute(array(
            'id' => $id,
            'nom' => $nom,
            'facId' => $facId
        ));
    }
     // fonction qui supprime une formation de la base de données
    public function deleteFormation($id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('DELETE FROM formation WHERE formationId = :id');
        $req->execute(array('id' => $id));
    }

}

?>