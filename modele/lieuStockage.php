<?php
class LieuStockage{
    //variables de la class
    private $_nomLieu;
    
    public function __construct($nomLieu) {
        $this->_nomLieu = $nomLieu;
    }
    // getter et setter
    public function getNomLieu() {
        return $this->_nomLieu;
    }

    public function setNomLieu($nomLieu) {
        $this->_nomLieu = $nomLieu;
    }
}
?>