<?php
 require_once('../class/Database.php');
 require_once('../class/Personne.php');
 $connexion = new Database('localhost', 'archivepoo', 'root', '');
 $bdd = $connexion->PDOConnexion();

 $current_id=$_GET['id'];

$supp = new Personne(null ,null ,null , null, null, null, null);
$supp -> deletePersonne($bdd, $current_id);



?>
