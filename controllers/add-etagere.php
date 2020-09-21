<?php
// j'appelle mes classes
require_once('../modele/Database.php');
require_once('../modele/Etagere.php');
 //je crée ma connexion
$connexion = new Database('localhost', 'archivepoo', 'root', '');
$bdd = $connexion->PDOConnexion();
// variables ou je récupère les informations du formulaire
$nomEtagere=$_POST['nomEtagere'];
$etagere=$_POST['etagere'];
// création de la nouvelle étagère
$etagere = new Etagere($nomEtagere, $etagere);
//j'appelle ma fonction
$etagere -> addEtagere($bdd);
?>