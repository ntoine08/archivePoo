<?php
class Zone{
    private $_nomZone;
    private $_id_stockage;

    public function __construct($nomZone, $id_stockage) {
        $this->_nomZone = $nomZone;
        $this->_id_stockage = $id_stockage;
    }

    public function getNomZone() {
        return $this->_nomZone;
    }

    public function setNomZone($nomZone) {
        $this->_nomZone = $nomZone;
    }

    public function getId_stockage() {
        return $this->_id_stockage;
    }

    public function setId_stockage($id_stockage) {
        $this->_id_stockage = $id_stockage;
    }

    public function addZone($bdd){
        $req = $bdd->prepare('INSERT INTO zone (nomZone, id_stockage) VALUES (:nomZone, :id_stockage)');
        $req->execute(array(
        'nomZone' => $this->_nomZone,
        'id_stockage' => $this->_id_stockage,
    ));

    header("location:../accueil.php");
    }
}
?>