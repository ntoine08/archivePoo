<?php
include 'connexion.php';

$nomZone=$_POST['nomZone'];
$zone=$_POST['zone'];

$req = $bdd->prepare('INSERT INTO zone (nomZone, id_stockage) VALUES (:nomZone, :id_stockage)');
$req->execute(array(
    'nomZone' => $nomZone,
    'id_stockage' => $zone,
  ));

  header("location:../accueil.php");
?>
