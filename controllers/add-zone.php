<?php
require_once('../class/Database.php');
require_once('../class/Zone.php');
$connexion = new Database('localhost', 'archivepoo', 'root', '');
$bdd = $connexion->PDOConnexion();

$nomZone=$_POST['nomZone'];
$zone=$_POST['zone'];

$zone = new Zone($nomZone, $zone);
$zone -> addZone($bdd);


?>
