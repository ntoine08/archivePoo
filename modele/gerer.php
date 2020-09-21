<?php
class Gerer{
    //variables de la class
    private $_id_personne;
    private $_id_zone;
    //création du constructeur
    public function __construct($id_personne, $id_zone){
        $this->_id_personne = $id_personne;
        $this->_id_zone = $id_zone;
    }
    // getter et setter
    public function getIdPersonne() {
        return $this->_id_personne;
    }

    public function setIdPersonne($id_personne) {
        $this->_id_personne = $id_personne;
    }

    public function getIdZone() {
        return $this->_id_zone;
    }

    public function setIdZone($id_zone) {
        $this->_id_zone = $id_zone;
    }
    // fonction pour ajouter des affectations
    public function addAffectation($bdd){
        // requête sql pour crée les affectations
        $req = $bdd->prepare('INSERT INTO gerer (id_personne, id_zone) VALUES (:id_personne, :id_zone)');
        $req->execute(array(
            'id_personne' => $this->_id_personne,
            'id_zone' => $this->_id_zone,
        ));

        header("location:../viewers/admin.php");
    }
    // fonction pour supprimer les affectations
    public function deleteAffectation($bdd){
        // requête sql pour supprimer les affectations
        $sql = "DELETE FROM gerer 
                WHERE id_personne='$this->_id_personne'";
        $req= $bdd->prepare($sql);
        $req->execute();
        $req->closeCursor();
        header("location:../viewers/admin.php");
    }
}
?>