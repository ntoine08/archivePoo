<?php
require_once('../class/Database.php');
require_once('../class/Etagere.php');
$connexion = new Database('localhost', 'archivepoo', 'root', '');
$bdd = $connexion->PDOConnexion();

$nomEtagere=$_POST['nomEtagere'];
$etagere=$_POST['etagere'];

$etagere = new Etagere($nomEtagere, $etagere);
$etagere -> addEtagere($bdd);
?>