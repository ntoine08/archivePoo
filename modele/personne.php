<?php
class Personne{
    //variables de la class
    private $_nom;
    private $_prenom;
    private $_adresse;
    private $_mail;
    private $_telephone;
    private $_pseudo;
    private $_mdp;
    //création du constructeur
    public function __construct($nom, $prenom, $adresse, $mail, $telephone, $pseudo, $mdp) {
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_adresse = $adresse;
        $this->_mail = $mail;
        $this->_telephone = $telephone;
        $this->_pseudo = $pseudo;
        $this->_mdp = $mdp;
    }
    // getter et setter
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

    //fonction pour crée une personne
    public function insertUser($bdd){
        $this->_nom;
        $this->_prenom;
        $this->_adresse;
        $this->_mail;
        $this->_telephone;
        $this->_pseudo;
        $this->_mdp = password_hash($this->_mdp, PASSWORD_BCRYPT);// pour hashé le mot de passe
        // requête sql pour crée la personne
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
        header("location:../viewers/accueil.php");
    }

    //fonction pour se connecter
    public function login($bdd){
        //  Récupération de l'utilisateur et du mot de passe
        $req = $bdd->prepare('SELECT id_personne, mdp FROM personne WHERE pseudo = :pseudo');
        $req->execute(array(
            'pseudo' => $this->_pseudo));
        $resultat = $req->fetch();

        // Comparaison du pass envoyé via le formulaire avec la base
        $isPasswordCorrect = password_verify($_POST['pass1'], $resultat['mdp']);

        if (!$resultat)
        {
            echo 'Mauvais identifiant ou mot de passe !';
        }
        else
        {
            if ($isPasswordCorrect) {
                session_start();
                $_SESSION['id_personne'] = $resultat['id_personne'];
                $_SESSION['pseudo'] = $this->_pseudo;
                header("Location: ../viewers/accueil.php");
            }
            else {
                echo 'Mauvais identifiant ou mot de passe !';
                header("Location: ../index.php");
            }
        }
    }
    // fonction pour modifier la personne
    public function modifPersonne($bdd, $current_id){
        // requête sql pour modifier la personne
        $bdd->query("UPDATE personne SET nomPersonne='$this->_nom',
                                         prenomPersonne='$this->_prenom', 
                                         adresse='$this->_adresse', 
                                         mail='$this->_mail', 
                                         telephone='$this->_telephone' 
                     WHERE id_personne='$current_id'");

            header('location:../viewers/admin.php');
    }
    // fonction pour supprimer la personne
    public function deletePersonne($bdd, $current_id){
        // requête sql pour récupéré l'id de la personne puis la supprimer
        $bdd->query("UPDATE personne SET id_personne=NULL WHERE id_personne='$current_id'");
        $bdd->query("DELETE FROM personne WHERE id_personne = '$current_id'");


        header("location:../viewers/admin.php");        
    }    
}
?>