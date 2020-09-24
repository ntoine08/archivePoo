<?php
// j'appelle mes classes
 require_once('../modele/Database.php');
 require_once('../modele/Personne.php');
 //je crée ma connexion
 $connexion = new Database('localhost', 'archivepoo', 'root', '');
 $bdd = $connexion->PDOConnexion();

// variables ou je récupère les informations du formulaire
$current_id=$_GET['id'];
$nom=$_POST["nomPersonne"];
$prenom=$_POST["prenomPersonne"];
$adresse=$_POST["adresse"];
$mail=$_POST["mail"];
$telephone=$_POST["telephone"];
// création de la modification de personne
$modif = new Personne($nom ,$prenom ,$adresse , $mail, $telephone, null, null);
//j'appelle ma fonction
$modif -> modifPersonne($bdd, $current_id);
?>