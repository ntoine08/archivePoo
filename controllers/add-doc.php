<?php
require_once('../class/Database.php');
require_once('../class/Document.php');
$connexion = new Database('localhost', 'archivepoo', 'root', '');
$bdd = $connexion->PDOConnexion();

$nomDocument=$_POST['nomDocument'];
$doc=$_POST['doc'];
$pers=$_POST['pers'];

$document = new Document($nomDocument, $doc, $pers);
$document -> addDocument($bdd);
?>
