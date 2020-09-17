<?php
require_once('../class/Database.php');
require_once('../class/Gerer.php');
$connexion = new Database('localhost', 'archivepoo', 'root', '');
$bdd = $connexion->PDOConnexion();

$recupereID = $_GET['id_personne'];
// INTVAL(prend que un int)
$id = intval($recupereID);

$etagere = new Gerer($recupereID, null);
$etagere -> deleteAffectation($bdd, $recupereID);


?>