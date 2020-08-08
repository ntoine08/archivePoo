<?php
include 'connexion.php';

$nomEtagere=$_POST['nomEtagere'];
$etagere=$_POST['etagere'];

$req = $bdd->prepare('INSERT INTO etagere (nomEtagere, id_zone) VALUES (:nomEtagere, :id_zone)');
$req->execute(array(
    'nomEtagere' => $nomEtagere,
    'id_zone' => $etagere,
  ));

  header("location:../accueil.php");
?>