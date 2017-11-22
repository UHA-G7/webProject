<?php
/*Model qui gère:
 *  l'ajout
 *  la suppression
 *  la modification
 *  la selection des facultés
 */
class ModelFaculte {
    // fonction qui ajoute une faculté dans la base de données
    public function addFac($nom) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('INSERT INTO faculte (faculteNom) VALUES (:nom)');
        $req->execute(array('nom' => $nom));
        
    }
    // fonction qui renvoi toutes les facultés de la base de données
    public function getAllFacs() {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare("SELECT * FROM faculte ORDER BY faculteNom ASC");
        $req->execute();
        $facs = $req->fetchAll();
        return $facs;
    }
    // fonction qui renvoi une faculté de la base de données
    public function getFaculte($id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare("SELECT * FROM faculte WHERE faculteId= :id ");
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();
        $fac = $req->fetchAll();
        return $fac;
    }
    // fonction qui met à jour les information d'une faculté
    public function updateFaculte($nom, $id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('UPDATE faculte SET faculteNom = :nom WHERE faculteId = :id');
        $req->execute(array(
            'nom' => $nom,
            'id' => $id
        ));
    }
    
    // fonction qui supprime  une faculté de la base de données
    public function deleteFaculte($id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('DELETE FROM faculte WHERE faculteId = :id');
        $req->execute(array('id' => $id));
    }

}

?>