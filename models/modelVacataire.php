<?php

/* Model qui gère:
 *  l'ajout
 *  la suppression
 *  la modification
 *  la selection des vacataires
 */

class ModelVacataire {

    public function logincheck($uname, $upwd) {
        $bdd = Connexion::getInstance();
        $sql = "SELECT * FROM vacataire WHERE vacataireEmail=? AND vacatairePasse=?";
        $req = $bdd->prepare($sql);
        $req->bindParam(1, $uname, PDO::PARAM_STR);
        $req->bindParam(2, $upwd, PDO::PARAM_STR);
        $req->execute();
        $res = $req->fetchAll();
        return $res;
    }

    // fonction qui ajoute un vacataire dans la base de données
    public function add($nom, $prenom, $adresse, $phone, $emp, $email, $pwd) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('INSERT INTO vacataire (vacataireNom,vacatairePrenom,vacataireAdresse,vacatairePhone,vacataireEmployeur,vacataireEmail,vacatairePasse)'
                . ' VALUES (:nom, :prenom, :adresse,:phone,:emp,:email,:passe)');
        $req->execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'adresse' => $adresse,
            'phone' => $phone,
            'emp' => $emp,
            'email' => $email,
            'passe' => $pwd,
                )
        );
    }

    // fonction qui renvoi toutes les vacataires de la base de données
    public function getAll() {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare("SELECT * FROM vacataire ORDER BY vacataireNom ASC");
        $req->execute();
        $vacs = $req->fetchAll();
        return $vacs;
    }

    // fonction qui renvoi une vacataire de la base de données
    public function getOne($id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare("SELECT * FROM vacataire WHERE vacataireId= :id ");
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();
        $vac = $req->fetchAll();
        return $vac;
    }

    // fonction qui met à jour les information d'un vacataire
    public function update($nom, $prenom, $adresse, $phone, $emp, $email, $pwd, $id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('UPDATE vacataire SET vacataireNom = :nom ,vacatairePrenom = :prenom ,'
                . 'vacataireAdresse =:adresse, vacatairePhone = :phone, vacataireEmployeur = :emp,'
                . 'vacataireEmail = :email, vacatairePasse = :pass WHERE vacataireId = :id');
        $req->execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'adresse' => $adresse,
            'phone' => $phone,
            'emp' => $emp,
            'email' => $email,
            'pass' => $pwd,
            'id' => $id
        ));
    }
    // fonction qui met à jour le mot de passe d'un vacataire
    public function updateUserPwd($pwd, $id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('UPDATE vacataire SET vacatairePasse = :pass WHERE vacataireId = :id');
        if ($req->execute(array('pass' => $pwd, 'id' => $id))) {
            return true;
        } else {
            return false;
        }
    }
    // fonction qui supprime  une vacataire de la base de données
    public function delete($id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('DELETE FROM vacataire WHERE vacataireId = :id');
        $req->execute(array('id' => $id));
    }

}
