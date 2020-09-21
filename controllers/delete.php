<?php
// j'appelle mes classes
 require_once('../modele/Database.php');
 require_once('../modele/Personne.php');
  //je crée ma connexion
 $connexion = new Database('localhost', 'archivepoo', 'root', '');
 $bdd = $connexion->PDOConnexion();
// variable ou je récupère l'id pour supprimer la personne
 $current_id=$_GET['id'];
// création de la nouvelle delete
$supp = new Personne(null ,null ,null , null, null, null, null);
//j'appelle ma fonction
$supp -> deletePersonne($bdd, $current_id);

?>
