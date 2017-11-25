<?php

/* Model qui gère:
 *  l'ajout
 *  la suppression
 *  la modification
 *  la selection des respondables finaancier
 */

class ModelRespFinancier{
    public function logincheck($uname, $upwd) {
        $bdd = Connexion::getInstance();
        $sql = "SELECT * FROM responsablefinancier WHERE respFinEmail=? AND respFinPasse=?";
        $req = $bdd->prepare($sql);
        $req->bindParam(1, $uname, PDO::PARAM_STR);
        $req->bindParam(2, $upwd, PDO::PARAM_STR);
        $req->execute();
        $res = $req->fetchAll();
        return $res;
    }
    // fonction qui ajoute un respondable finaancier dans la base de données
    public function add($nom,$prenom,$adresse,$phone,$email,$pwd) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('INSERT INTO responsablefinancier (respFinNom,respFinPrenom,respFinAdresse,respFinPhone,respFinEmail,respFinPasse)'
                . ' VALUES (:nom, :prenom, :adresse,:phone,:email,:passe)');
        $req->execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'adresse' => $adresse,            
            'phone' => $phone,
            'email' => $email,
            'passe' => $pwd
            
                )
        );
        
    }

    // fonction qui renvoi toutes les responsables finaancier de la base de données
    public function getAll() {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare("SELECT * FROM responsablefinancier ORDER BY respFinNom ASC");
        $req->execute();
        $vacs = $req->fetchAll();
        return $vacs;
    }

    // fonction qui renvoi un responsable finaancier de la base de données
    public function getOne($id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare("SELECT * FROM responsablefinancier WHERE respFinId= :id ");
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();
        $vac = $req->fetchAll();
        return $vac;
    }
     
    // fonction qui met à jour les infinaancier d'un responsable finaancier
    public function update($nom,$prenom,$adresse,$phone,$email,$pwd, $id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('UPDATE responsablefinancier SET respFinNom = :nom ,respFinPrenom = :prenom ,'
                . 'respFinAdresse = :adresse, respFinPhone = :phone,respFinEmail = :email, respFinPasse = :pass'
                . ' WHERE respFinId = :id');
        $req->execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'adresse' => $adresse,            
            'phone' => $phone,
            'email' => $email,
            'pass' => $pwd,
            'id' => $id
        ));
        
    }
    // fonction qui met à jour le mot de passe 
    public function updateUserPwd($pwd, $id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('UPDATE responsablefinancier SET respFinPasse = :pass WHERE respFinId = :id');
        if ($req->execute(array('pass' => $pwd, 'id' => $id))) {
            return true;
        } else {
            return false;
        }
    }
    // fonction qui supprime  un responsable finaancier de la base de données
    public function delete($id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('DELETE FROM responsablefinancier WHERE respFinId = :id');
        $req->execute(array('id' => $id));
    }

}

