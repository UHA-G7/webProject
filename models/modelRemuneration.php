<?php
/*Model qui gère:
 *  l'ajout
 *  la suppression
 *  la modification
 *  la selection des remunerations d'une formation
 */

class ModelRemuneration {

     // fonction d'ajout d'une remuneration dans la base de données
    
    public function addRemuneration($dateD, $dateF, $controlerId, $respFinancierId) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('INSERT INTO remuneration (dateD, dateF, controleurId, respFinId) 
        VALUES (:dateD, :dateF, :controlerId, :respFinId)');
        $req->execute(array(
            'dateD' => $dateD,
            'dateF' => $dateF,
            'controlerId' => $controlerId,
            'respFinId' => $respFinancierId
        ));
    }
    // fonction qui renvoi toutes les remunerations de la base de données
    public function getAllRemunerations() {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare("SELECT * FROM remuneration ORDER BY remunerationId ASC");
        $req->execute();
        $forms = $req->fetchAll();
        return $forms;
    }
    // fonction qui renvoi une remuneration de la base de données
    public function getRemuneration($id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare("SELECT * FROM remuneration WHERE remunerationId= :id ");
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();
        $mat = $req->fetchAll();
        return $mat;
    }
    // fonction qui modifie les informations d'une remunerations
    public function updateRemuneration($id, $dateD, $dateF, $controlerId, $respFinancierId) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('UPDATE remuneration SET dateD = :dateD, dateF = :dateF, controleurId = :controlerId, respFinId = :respFinId  WHERE remunerationId = :id');
        $req->execute(array(
            'id' => $id,
            'dateD' => $dateD,
            'dateF' => $dateF,
            'controlerId' => $controlerId,
            'respFinId' => $respFinancierId
        ));
    }
    // fonction qui supprime une remuneration de la base de données
    public function deleteRemuneration($id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('DELETE FROM remuneration WHERE remunerationId = :id');
        $req->execute(array('id' => $id));
    }


}

?>