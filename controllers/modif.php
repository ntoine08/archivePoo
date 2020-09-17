<?php
 require_once('../class/Database.php');
 require_once('../class/Personne.php');
 $connexion = new Database('localhost', 'archivepoo', 'root', '');
 $bdd = $connexion->PDOConnexion();


$current_id=$_GET['id'];
$nom=$_POST["nomPersonne"];
$prenom=$_POST["prenomPersonne"];
$adresse=$_POST["adresse"];
$mail=$_POST["mail"];
$telephone=$_POST["telephone"];

$modif = new Personne($nom ,$prenom ,$adresse , $mail, $telephone, null, null);
$modif -> modifPersonne($bdd, $current_id);




?>