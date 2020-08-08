<?php

include 'connexion.php';

$current_id=$_GET['id'];

$bdd->query("UPDATE personne SET id_personne=NULL WHERE id_personne='$current_id'");
$bdd->query("DELETE FROM personne WHERE id_personne = '$current_id'");


header("location:../admin.php");
?>
