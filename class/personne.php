<?php
class Personne{

    private $_nom;
    private $_prenom;
    private $_adresse;
    private $_mail;
    private $_telephone;
    private $_pseudo;
    private $_mdp;

    public function __construct($nom, $prenom, $adresse, $mail, $telephone, $pseudo, $mdp) {
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_adresse = $adresse;
        $this->_mail = $mail;
        $this->_telephone = $telephone;
        $this->_pseudo = $pseudo;
        $this->_mdp = $mdp;
    }

    public function getNom() {
        return $this->_nom;
    }

    public function setNom($nom) {
        $this->_nom = $nom;
    }

    public function getPrenom() {
        return $this->_prenom;
    }

    public function setPrenom($prenom) {
        $this->_prenom = $prenom;
    }

    public function getAdresse() {
        return $this->_adresse;
    }

    public function setAdresse($adresse) {
        $this->_adresse = $adresse;
    }

    public function getMail() {
        return $this->_mail;
    }

    public function setMail($mail) {
        $this->_mail = $mail;
    }

    public function getTelephone() {
        return $this->_telephone;
    }

    public function setTelephone($telephone) {
        $this->_telephone = $telephone;
    }

    public function getPseudo() {
        return $this->_pseudo;
    }

    public function setPseudo($pseudo) {
        $this->_pseudo = $pseudo;
    }

    public function getMdp() {
        return $this->_mdp;
    }

    public function setMdp($mdp) {
        $this->_mdp = $mdp;
    }

    public function insertUser($bdd){
        $this->_nom;
        $this->_prenom;
        $this->_adresse;
        $this->_mail;
        $this->_telephone;
        $this->_pseudo;
        $this->_mdp = password_hash($this->_mdp, PASSWORD_BCRYPT);

        $req = $bdd->prepare('INSERT INTO personne (nomPersonne, prenomPersonne, adresse, mail, telephone, pseudo, mdp) 
                            VALUES (:nomPersonne, :prenomPersonne, :adresse, :mail, :telephone, :pseudo, :mdp)');
        $req->execute(array(
        'nomPersonne' => $this->_nom,
        'prenomPersonne' => $this->_prenom,
        'adresse' => $this->_adresse,
        'mail' => $this->_mail,
        'telephone' => $this->_telephone,
        'pseudo' => $this->_pseudo,
        'mdp' => $this->_mdp,
        ));
        header("location:../accueil.php");
    }
    
}
?>