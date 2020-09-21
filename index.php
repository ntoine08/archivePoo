<?php
// j'appelle ma classe
require_once('modele/Database.php');
// je crée ma connexion
$connexion = new Database('localhost', 'archivepoo', 'root', '');
$bdd = $connexion->PDOConnexion();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">

    <title>ARCHIVE</title>
</head>

<body>

    <div class="conn">
        <h1>Connexion</h1>
        <!-- formulaire pour se connecter, relié au controller -->
            <form class="login-form" method="POST" action="controllers/login.php">
            <input type="text" placeholder="pseudo" id="pseudo1" name="pseudo1"/>
            <input type="password" placeholder="Mdp" id="pass1" name="pass1"/>
            <button>connexion</button>
            </form>
    </div>
</body>
</html>