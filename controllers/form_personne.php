<?php
// j'appelle mes classes
require_once('../modele/Database.php');
require_once('../modele/personne.php');
//je crée ma connexion
$connexion = new Database('localhost', 'archivepoo', 'root', '');
$bdd = $connexion->PDOConnexion();
// variables ou je récupère les informations du formulaire
$nom = $_POST['nomPersonne'];
$prenom = $_POST['prenomPersonne'];
$adresse = $_POST['adresse'];
$mail = $_POST['mail'];
$telephone = $_POST['telephone'];
$pseudo = $_POST['pseudo'];
$mdp = $_POST['mdp'];
// création de la nouvelle personne
$personneCree = new Personne($nom, $prenom, $adresse, $mail, $telephone, $pseudo, $mdp);
//j'appelle ma fonction
$personneCree -> insertUser( $bdd);

?>