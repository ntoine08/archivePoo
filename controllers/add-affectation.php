<?php
// j'appelle mes classes
 require_once('../modele/Database.php');
 require_once('../modele/Gerer.php');
 //je crée ma connexion
 $connexion = new Database('localhost', 'archivepoo', 'root', '');
 $bdd = $connexion->PDOConnexion();
// variables ou je récupère les informations du formulaire
$nomPersonne=$_POST['perso'];
$nomZone=$_POST['zon'];
// création de la nouvelle affectation
$gerer = new gerer($nomPersonne, $nomZone);
//j'appelle ma fonction
$gerer -> addAffectation($bdd);
?>