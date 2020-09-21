<?php
// j'appelle mes classes
require_once('../modele/Database.php');
require_once('../modele/Zone.php');
 //je crée ma connexion
$connexion = new Database('localhost', 'archivepoo', 'root', '');
$bdd = $connexion->PDOConnexion();
// variables ou je récupère les informations du formulaire
$nomZone=$_POST['nomZone'];
$zone=$_POST['zone'];
// création de la nouvelle zone
$zone = new Zone($nomZone, $zone);
//j'appelle ma fonction
$zone -> addZone($bdd);

?>
