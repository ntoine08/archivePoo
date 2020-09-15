<?php 
class Database{
    //variables de la class
    private $_host;
    private $_dbname;
    private $_username;
    private $_password;

    //création du constructeur
    public function __construct($_host, $_dbname, $_username, $_password){
        $this->_host = $_host;
        $this->_dbname = $_dbname;
        $this->_username = $_username;
        $this->_password = $_password;
    }

    public function getHost() {
        return $this->_host;
    }

    public function getDbname() {
        return $this->_dbname;
    }

    public function setDbname($dbname) {
        $this->_dbname = $dbname;
    }

    public function getUsername() {
        return $this->_username;
    }

    public function getPassword() {
        return $this->_password;
    }
   
    //fonction permettant de se connecter
    public function PDOConnexion(){
        $bdd = new PDO("mysql:host=$this->_host; dbname=$this->_dbname", $this->_username, $this->_password);
        $bdd ->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // faire un return de la bdd ou non en fonction de la ou on utilise la connexion
        return $bdd;
    }
}
?>