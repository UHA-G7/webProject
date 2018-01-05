<?php
/*Model qui gère:
 *  l'ajout
 *  la suppression
 *  la modification
 *  la selection des documents d'un  vacataire
 */

class ModelDocument {

     // fonction d'ajout d'un documents dans la base de données
    
    public function add($dNom, $dUrl, $vac){
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('INSERT INTO documents (libelle, documentUrl, vacataireId) VALUES (:lib, :url, :vId)');
        $req->execute(array(
            'lib' => $dNom,
            'url' => $dUrl,
            'vId' => $vac,
            
        ));
    }
    // fonction qui renvoi tous les documents de la base de données
    public function getAll() {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare("SELECT * FROM documents ORDER BY libelle ASC");
        $req->execute();
        $docs = $req->fetchAll();
        return $docs;
    }
    // fonction qui renvoi tous les documents d'un vacataire
    public function getDocsByVacataire($id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare("SELECT * FROM documents WHERE vacataireId = :id ORDER BY libelle ASC");
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();
        $docs = $req->fetchAll();
        return $docs;
    }
    // fonction qui renvoi un document de la base de données
    public function getOne($id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare("SELECT * FROM documents WHERE documentId= :id ");
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();
        $doc = $req->fetchAll();
        return $doc;
    }
    // fonction qui modifie les informations d'un document
   /* public function update($id, $dNom, $dUrl, $vac) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('UPDATE documents SET libelle = :lib, documenetUrl = :url, vacataireId = :vac WHERE documentId = :id');
        $req->execute(array(
            'id' => $id,
            'libelle' => $dNom,
            'documenetUrl' => $dUrl,
            'vacataireId' => $vac,
            
        ));
    }*/
    // fonction qui supprime un document de la base de données
    public function delete($id) {
        $bdd = Connexion::getInstance();
        $req = $bdd->prepare('DELETE FROM documents WHERE documentId = :id');
        $req->execute(array('id' => $id));
    }

}

