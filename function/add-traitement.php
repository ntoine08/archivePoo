<?php
include 'connexion.php';

$nomPersonne=$_POST['pers'];
$nomDocument=$_POST['docu'];


$req = $bdd->prepare('INSERT INTO traiter2 (id_personne, id_document) VALUES (:id_personne, :id_document)');
$req->execute(array(
    'id_personne' => $nomPersonne,
    'id_document' => $nomDocument,
  ));

  header("location:../admin.php");
?>