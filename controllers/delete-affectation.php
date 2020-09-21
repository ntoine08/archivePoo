<?php
// j'appelle mes classes
require_once('../modele/Database.php');
require_once('../modele/Gerer.php');
//je crée ma connexion
$connexion = new Database('localhost', 'archivepoo', 'root', '');
$bdd = $connexion->PDOConnexion();
// je récupère l'id pour supprimer
$recupereID = $_GET['id_personne'];
// INTVAL(prend que un int)
$id = intval($recupereID);
// création de la nouvelle delete
$etagere = new Gerer($id, null);
//j'appelle ma fonction
$etagere -> deleteAffectation($bdd, $id);

?>