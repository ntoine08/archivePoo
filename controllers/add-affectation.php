<?php
 require_once('../class/Database.php');
 require_once('../class/Gerer.php');
 $connexion = new Database('localhost', 'archivepoo', 'root', '');
 $bdd = $connexion->PDOConnexion();

$nomPersonne=$_POST['perso'];
$nomZone=$_POST['zon'];


$gerer = new gerer($nomPersonne, $nomZone);
$gerer -> addAffectation($bdd);
?>