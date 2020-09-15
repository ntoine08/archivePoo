<?php
class Zone{
    private $_nomZone;

    public function __construct($nomZone) {
        $this->_nomZone = $nomZone;
    }

    public function getNomZone() {
        return $this->_nomZone;
    }

    public function setNomZone($nomZone) {
        $this->_nomZone = $nomZone;
    }
}
?>