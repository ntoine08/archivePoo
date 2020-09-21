<?php
// j'appelle mes classes
require_once('../modele/Database.php');
require_once('../modele/Document.php');
//je crée ma connexion
$connexion = new Database('localhost', 'archivepoo', 'root', '');
$bdd = $connexion->PDOConnexion();
// variables ou je récupère les informations du formulaire
$nomDocument=$_POST['nomDocument'];
$doc=$_POST['doc'];
$pers=$_POST['pers'];
// création du nouveau document
$document = new Document($nomDocument, $doc, $pers);
//j'appelle ma fonction
$document -> addDocument($bdd);
?>
