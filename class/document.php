<?php
class Document{
    private $_nomDocument;

    public function __construct($nomDocument) {
        $this->_nomDocument = $nomDocument;
    }

    public function getNomDocument() {
        return $this->_nomDocument;
    }

    public function setNomDocument($nomDocument) {
        $this->_nomDocument = $nomDocument;
    }
}
?>