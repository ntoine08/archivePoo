<?php
    include 'connexion.php';

    $pseudo = isset($_POST['pseudo1']) ? $_POST['pseudo1'] : NULL;
    $pass = isset($_POST['pass1']) ? $_POST['pass1'] : NULL;


//  Récupération de l'utilisateur et du mot de passe
$req = $bdd->prepare('SELECT id_personne, mdp FROM personne WHERE pseudo = :pseudo');
$req->execute(array(
    'pseudo' => $pseudo));
$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['pass1'], $resultat['mdp']);

if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id_personne'] = $resultat['id_personne'];
        $_SESSION['pseudo'] = $pseudo;
        header("Location: ../accueil.php");
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
        header("Location: ../index.php");
    }
}
?>