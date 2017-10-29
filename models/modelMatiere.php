<?php
/*Model qui gère:
 *  l'ajout
 *  la suppression
 *  la modification
 *  la selection des matières d'une formation
 */

class ModelMatiere {

     // fonction d'ajout d'une matière dans la base de données
    
    public function addMatiere($nom, $formaId) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('INSERT INTO matiere (matiereNom, formationId ) VALUES (:nom, :formation)');
        $req->execute(array(
            'nom' => $nom,
            'formation' => $formaId
        ));
    }
    // fonction qui renvoi toutes les matières de la base de données
    public function getAllMatieres() {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare("SELECT * FROM matiere ORDER BY matiereNom ASC");
        $req->execute();
        $forms = $req->fetchAll();
        return $forms;
    }
    // fonction qui renvoi une matière de la base de données
    public function getMatiere($id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare("SELECT * FROM matiere WHERE matiereId= :id ");
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();
        $mat = $req->fetchAll();
        return $mat;
    }
    // fonction qui modifie les informations d'une matières
    public function updateMatiere($id, $nom, $formaId) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('UPDATE matiere SET matiereNom = :nom, formationId = :formaId  WHERE matiereId = :id');
        $req->execute(array(
            'id' => $id,
            'nom' => $nom,
            'formaId' => $formaId
        ));
    }
    // fonction qui supprime une matière de la base de données
    public function deleteMatiere($id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('DELETE FROM matiere WHERE matiereId = :id');
        $req->execute(array('id' => $id));
    }

}

?>