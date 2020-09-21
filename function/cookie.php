<?php
include 'connexion.php';

setcookie('bg', $_GET['color'], time() + (86400 * 30), "/");
 header("location:../viewers/accueil.php");

 ?>