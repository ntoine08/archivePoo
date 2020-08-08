<?php

include 'connexion.php';
$current_id=$_GET['id'];
$nom=$_POST["nomPersonne"];
$prenom=$_POST["prenomPersonne"];
$adresse=$_POST["adresse"];
$mail=$_POST["mail"];
$telephone=$_POST["telephone"];


$bdd->query("UPDATE personne SET nomPersonne='$nom', prenomPersonne='$prenom', adresse='$adresse', mail='$mail', telephone='$telephone' WHERE id_personne='$current_id'");

header('location:../admin.php');
?>