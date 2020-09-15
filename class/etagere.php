<?php
class Etagere{
    private $_nomEtagere;

    public function __construct($nomEtagere) {
        $this->_nomEtagere = $nomEtagere;
    }

    public function getNomEtagere() {
        return $this->_nomEtagere;
    }

    public function setNomEtagere($nomEtagere) {
        $this->_nomEtagere = $nomEtagere;
    }
}
?>