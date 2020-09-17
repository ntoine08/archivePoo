<?php
session_start();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();

echo "Vous êtes maintenant déconnecté <a href=\"../index.php\">connectez vous</a>";

?>