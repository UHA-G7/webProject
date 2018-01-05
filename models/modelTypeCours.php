<?php
/*Model qui gère:
 *  l'ajout
 *  la suppression
 *  la modification
 *  la selection des types de cours d'une formation
 */

class ModelTypeCours {

     // fonction d'ajout d'un type de cours dans la base de données
    
    public function addTypeCours($libelle, $prixHeure) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('INSERT INTO typeCour (libelle, prixHeure ) VALUES (:libelle, :prixHeure)');
        $req->execute(array(
            'libelle' => $libelle,
            'prixHeure' => $prixHeure
        ));
    }
    // fonction qui renvoi tous les types de cours de la base de données
    public function getAllTypeCours() {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare("SELECT * FROM typeCour ORDER BY typeCourId ASC");
        $req->execute();
        $forms = $req->fetchAll();
        return $forms;
    }
    // fonction qui renvoi un type de cours de la base de données
    public function getTypeCours($id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare("SELECT * FROM typeCour WHERE typeCourId= :id ");
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();
        $mat = $req->fetchAll();
        return $mat;
    }
    // fonction qui modifie les informations d'un type de cours
    public function updateTypeCours($id, $libelle, $prixHeure) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('UPDATE typeCour SET libelle = :libelle, prixHeure = :prixHeure  WHERE typeCourId = :id');
        $req->execute(array(
            'id' => $id,
            'libelle' => $libelle,
            'prixHeure' => $prixHeure
        ));
    }
    // fonction qui supprime un type de cours de la base de données
    public function deleteTypeCours($id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('DELETE FROM typeCour WHERE typeCourId = :id');
        $req->execute(array('id' => $id));
    }

}

?>