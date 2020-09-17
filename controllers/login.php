<?php
    require_once('../class/Database.php');
    require_once('../class/Personne.php');
    $connexion = new Database('localhost', 'archivepoo', 'root', '');
    $bdd = $connexion->PDOConnexion();
    
    $pseudo = isset($_POST['pseudo1']) ? $_POST['pseudo1'] : NULL;
    $pass = isset($_POST['pass1']) ? $_POST['pass1'] : NULL;

    $user = new Personne(null, null, null, null, null, $pseudo, $pass);
    $user -> login($bdd);

?>