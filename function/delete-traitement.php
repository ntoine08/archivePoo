<?php

include 'connexion.php';
// recupere id de l'url
$recupereID = $_GET['id'];
// INTVAL(prend que un int)
$id = intval($recupereID);

// SUPPRIME L'id de traiter2 WHERE (id) de la table = ($id) depuis le bouton
$sql = 'DELETE FROM traiter2 WHERE id=:id';
$req= $bdd->prepare($sql);
$req->execute([':id' => $id]);
header("location:../admin.php");
?>


