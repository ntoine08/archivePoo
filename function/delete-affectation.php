<?php

include 'connexion.php';
// recupere id de l'url
$recupereID = $_GET['id_affecter'];
// INTVAL(prend que un int)
$id = intval($recupereID);

// SUPPRIME L'id de traiter2 WHERE (id) de la table = ($id) depuis le bouton
$sql = 'DELETE FROM affecter2 WHERE id_affecter=:id_affecter';
$req= $bdd->prepare($sql);
$req->execute([':id_affecter' => $id]);
header("location:../admin.php");
?>