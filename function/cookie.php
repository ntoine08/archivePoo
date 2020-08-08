<?php
include 'connexion.php';

setcookie('bg', $_GET['color'], time() + (86400 * 30), "/");
 header("location:../accueil.php");
// cookies have to be handled before any html coding...
// $color = $_GET['color'];
// $_COOKIE["color"] = null;
//  if (!$_COOKIE["color"]) {
//    $color = $_GET['color'];
// // only set cookie if form has been filled out
//    if ($color) {
//  //this adds about 6 months to current time making a cookie that expires in 6 months
//      $timesecs = 6*30*24*3600 + time();
//      $color = $_GET['color'];
//      setcookie(color, $color, $timesecs);
//    }
//  }
 ?>