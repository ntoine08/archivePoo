<?php
class Document{
    //variables de la class
    private $_nomDocument;
    private $_id_etagere;
    private $_id_personne;
    //création du constructeur
    public function __construct($nomDocument, $id_etagere, $id_personne) {
        $this->_nomDocument = $nomDocument;
        $this->_id_etagere = $id_etagere;
        $this->_id_personne = $id_personne;
    }
    // getter et setter
    public function getNomDocument() {
        return $this->_nomDocument;
    }

    public function setNomDocument($nomDocument) {
        $this->_nomDocument = $nomDocument;
    }

    public function getId_etagere() {
        return $this->_id_etagere;
    }

    public function setId_etagere($id_etagere) {
        $this->_id_etagere = $id_etagere;
    }

    public function getId_personne() {
        return $this->_id_personne;
    }

    public function setId_personne($id_personne) {
        $this->_id_personne = $id_personne;
    }
    // fonction pour crée les documents
    public function addDocument($bdd){
        // requête sql pour crée les documents
        $req = $bdd->prepare('INSERT INTO document (nomDocument, id_etagere, id_personne) VALUES (:nomDocument, :id_etagere, :id_personne)');
        $req->execute(array(
            'nomDocument' => $this->_nomDocument,
            'id_etagere' => $this->_id_etagere,
            'id_personne' => $this->_id_personne,
        ));

        header("location:../viewers/accueil.php");
    }
}
?>