<?php
class Etagere{
    //variables de la class
    private $_nomEtagere;
    private $_id_zone;
    //création du constructeur
    public function __construct($nomEtagere, $id_zone) {
        $this->_nomEtagere = $nomEtagere;
        $this->_id_zone = $id_zone;
    }
    // getter et setter
    public function getNomEtagere() {
        return $this->_nomEtagere;
    }

    public function setNomEtagere($nomEtagere) {
        $this->_nomEtagere = $nomEtagere;
    }

    public function getId_zone() {
        return $this->_id_zone;
    }

    public function setId_zone($id_zone) {
        $this->_id_zone = $id_zone;
    }
    // fonction pour ajouter les étagères
    public function addEtagere($bdd) {
        // requête sql pour crée les étagères
        $req = $bdd->prepare('INSERT INTO etagere (nomEtagere, id_zone) VALUES (:nomEtagere, :id_zone)');
        $req->execute(array(
        'nomEtagere' => $this->_nomEtagere,
        'id_zone' => $this->_id_zone,
    ));

    header("location:../viewers/accueil.php");
    }
}
?>