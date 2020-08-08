<?php

include 'connexion.php';

$nom=$_POST['nomPersonne'];
$prenom=$_POST['prenomPersonne'];
$adresse=$_POST['adresse'];
$mail=$_POST['mail'];
$telephone=$_POST['telephone'];
$pseudo=$_POST['pseudo'];
$mdp= password_hash($_POST['mdp'], PASSWORD_BCRYPT);

$req = $bdd->prepare('INSERT INTO personne (nomPersonne, prenomPersonne, adresse, mail, telephone, pseudo, mdp) 
                      VALUES (:nomPersonne, :prenomPersonne, :adresse, :mail, :telephone, :pseudo, :mdp)');
$req->execute(array(
    'nomPersonne' => $nom,
    'prenomPersonne' => $prenom,
    'adresse' => $adresse,
    'mail' => $mail,
    'telephone' => $telephone,
    'pseudo' => $pseudo,
    'mdp' => $mdp,
));
  header("location:../accueil.php");
?>

