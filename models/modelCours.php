<?php
/*Model qui gère:
 *  l'ajout
 *  la suppression
 *  la modification
 *  la selection des cours d'une formation
 */

class ModelCours {

     // fonction d'ajout d'un cours dans la base de données
    
    public function addCours($courDate, $courduree, $courHD, $respAdminId, $vacataireId, $typeId, $remunerationId, $matiereId){
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('INSERT INTO cours (courDate, courduree, courHD, respAdminId, vacataireId, typeCourId, remunerationId, matiereId) 
        VALUES (:courDate, :courduree, :courHD, :respAdminId, :vacataireId, :typeCourId, :remunerationId, :matiereId)');
        $req->execute(array(
            'courDate' => $courDate,
            'courduree' => $courduree,
            'courHD' => $courHD,
            'respAdminId' => $respAdminId,
            'vacataireId' => $vacataireId,
            'typeCourId' => $typeId,
            'remunerationId' => $remunerationId,
            'matiereId' => $matiereId
        ));
    }
    // fonction qui renvoi tous les cours de la base de données
    public function getAllCours() {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare("SELECT * FROM cours ORDER BY courDate ASC");
        $req->execute();
        $forms = $req->fetchAll();
        return $forms;
    }
    // fonction qui renvoi un cours de la base de données
    public function getCours($id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare("SELECT * FROM cours WHERE courId= :id ");
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();
        $mat = $req->fetchAll();
        return $mat;
    }
    // fonction qui renvoi un cours de la base de données
    public function getCoursByVac($id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare("SELECT * FROM cours WHERE vacataireId= :id ");
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();
        $mat = $req->fetchAll();
        return $mat;
    }
    // fonction qui modifie les informations d'un cours
    public function updateCours($id, $courDate, $courduree, $courHD, $respAdminId, $vacataireId, $typeId, $remunerationId, $matiereId) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('UPDATE cours SET courDate = :courDate, courduree = :courduree, courHD = :courHD, respAdminId = :respAdminId, vacataireId = :vacataireId, typeCourId = :typeCourId, remunerationId = :remunerationId, matiereId = :matiereId  WHERE courId = :id');
        $req->execute(array(
            'id' => $id,
            'courDate' => $courDate,
            'courduree' => $courduree,
            'courHD' => $courHD,
            'respAdminId' => $respAdminId,
            'vacataireId' => $vacataireId,
            'typeCourId' => $typeId,
            'remunerationId' => $remunerationId,
            'matiereId' => $matiereId
        ));
    }
    // fonction qui supprime un cours de la base de données
    public function deleteCours($id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('DELETE FROM cours WHERE courId = :id');
        $req->execute(array('id' => $id));
    }

    public function validerCours($id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('UPDATE cours SET valide = "1" WHERE courId = :id');
        $req->execute(array('id' => $id));
    }

    public function payerCours($id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('UPDATE cours SET payer = "1" WHERE courId = :id');
        $req->execute(array('id' => $id));
    }

}

?>