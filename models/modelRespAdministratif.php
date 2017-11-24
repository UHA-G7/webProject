<?php

/* Model qui gère:
 *  l'ajout
 *  la suppression
 *  la modification
 *  la selection des respondables administratif
 */

class ModelRespAdministratif{

    // fonction qui ajoute un respondable administratif dans la base de données
    public function add($nom,$prenom,$adresse,$phone,$email,$pwd,$formation) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('INSERT INTO responsableadministratif (respAdminNom,respAdminPrenom,respAdminAdresse,respAdminPhone,respAdminEmail,respAdminPasse,formationId)'
                . ' VALUES (:nom, :prenom, :adresse,:phone,:email,:passe, :formation)');
        $req->execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'adresse' => $adresse,            
            'phone' => $phone,
            'email' => $email,
            'passe' => $pwd,
            'formation' => $formation
            
                )
        );
        
    }

    // fonction qui renvoi toutes les responsables administratif de la base de données
    public function getAll() {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare("SELECT * FROM responsableadministratif ORDER BY respAdminNom ASC");
        $req->execute();
        $vacs = $req->fetchAll();
        return $vacs;
    }

    // fonction qui renvoi un responsable administratif de la base de données
    public function getOne($id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare("SELECT * FROM responsableadministratif WHERE respAdminId= :id ");
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();
        $vac = $req->fetchAll();
        return $vac;
    }
     
    // fonction qui met à jour les inadministratif d'un responsable administratif
    public function update($nom,$prenom,$adresse,$phone,$email,$pwd,$formation, $id) {
        $bdd = Connexion::getInstance();
       // echo "$nom,$prenom,$adresse,$phone,$email,$pwd,$administratif,$id";
        $req = $bdd->prepare('UPDATE responsableadministratif SET respAdminNom = :nom ,respAdminPrenom = :prenom ,'
                . 'respAdminAdresse = :adresse, respAdminPhone = :phone,respAdminEmail = :email, respAdminPasse = :pass,'
                . 'formationId = :formation WHERE respAdminId = :id');
        $req->execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'adresse' => $adresse,            
            'phone' => $phone,
            'email' => $email,
            'pass' => $pwd,
            'formation' => $formation,
            'id' => $id
        ));
        
    }

    // fonction qui supprime  un responsable administratif de la base de données
    public function delete($id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('DELETE FROM responsableadministratif WHERE respAdminId = :id');
        $req->execute(array('id' => $id));
    }

}

