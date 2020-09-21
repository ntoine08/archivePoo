<?php
// j'appelle mes classes
require_once('../modele/Database.php');
require_once('../modele/Personne.php');
//je crée ma connexion
$connexion = new Database('localhost', 'archivepoo', 'root', '');
$bdd = $connexion->PDOConnexion();
// variables ou je récupère les informations du formulaire
$pseudo = isset($_POST['pseudo1']) ? $_POST['pseudo1'] : NULL;
$pass = isset($_POST['pass1']) ? $_POST['pass1'] : NULL;
// création de la nouvelle connexion
$user = new Personne(null, null, null, null, null, $pseudo, $pass);
//j'appelle ma fonction
$user -> login($bdd);
?>