<?php
class LieuStockage{
    private $_nomLieu;
    
    public function __construct($nomLieu) {
        $this->_nomLieu = $nomLieu;
    }

    public function getNomLieu() {
        return $this->_nomLieu;
    }

    public function setNomLieu($nomLieu) {
        $this->_nomLieu = $nomLieu;
    }

}
?>