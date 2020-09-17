<?php
class Gerer{
    private $_id_personne;
    private $_id_zone;

    public function __construct($id_personne, $id_zone){
        $this->_id_personne = $id_personne;
        $this->_id_zone = $id_zone;
    }

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

    public function addAffectation($bdd){
        $req = $bdd->prepare('INSERT INTO gerer (id_personne, id_zone) VALUES (:id_personne, :id_zone)');
        $req->execute(array(
            'id_personne' => $this->_id_personne,
            'id_zone' => $this->_id_zone,
        ));

        header("location:../admin.php");
    }

    public function deleteAffectation($bdd, $recupereID){
        
        $sql = "DELETE FROM gerer 
                WHERE id_personne='$recupereID'";
        $req= $bdd->prepare($sql);
        $req->execute([':id_personne' => $this->_id_personne]);

        header("location:../admin.php");
    }
}
?>