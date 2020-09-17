<?php
require_once('../class/Database.php');
require_once('../class/personne.php');

$connexion = new Database('localhost', 'archivepoo', 'root', '');
$bdd = $connexion->PDOConnexion();

$nom = $_POST['nomPersonne'];
$prenom = $_POST['prenomPersonne'];
$adresse = $_POST['adresse'];
$mail = $_POST['mail'];
$telephone = $_POST['telephone'];
$pseudo = $_POST['pseudo'];
$mdp = $_POST['mdp'];

$personneCree = new Personne($nom, $prenom, $adresse, $mail, $telephone, $pseudo, $mdp);

$personneCree -> insertUser( $bdd);

?>