<?php
include 'connexion.php';

$nomDocument=$_POST['nomDocument'];
$doc=$_POST['doc'];

$req = $bdd->prepare('INSERT INTO document (nomDocument, id_etagere) VALUES (:nomDocument, :id_etagere)');
$req->execute(array(
    'nomDocument' => $nomDocument,
    'id_etagere' => $doc,
  ));

  header("location:../accueil.php");
?>
