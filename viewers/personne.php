<?php
// j'appelle ma classe
require_once('../modele/Database.php');
// je crée ma connexion
$connexion = new Database('localhost', 'archivepoo', 'root', '');
$bdd = $connexion->PDOConnexion();
// démarrer la session
session_start();
// vérifier si il y'a un personne connecter
if (isset($_SESSION['id_personne']) AND isset($_SESSION['pseudo']))
{

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../css/style.css">

        <title>ARCHIVE</title>
    </head>

    <body>
    <ul class="index">
        <li><a href="accueil.php">Accueil</a></li>
        <li><a href="admin.php">Admin</a></li>
        <!-- relier le bouton déconnection au controller -->
        <li><a href="../controllers/logout.php">Se déconnecter <?php
                            if (isset($_SESSION['id_personne']) AND isset($_SESSION['pseudo']))
                            {
                                echo $_SESSION['pseudo'];
                            } ?>
            </a></li>
    </ul>
        
        <h1>Liste des personnes</h1>
        <!-- tableau pour afficher les personnes -->
        <table class="t2">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Adresse</th>
                        <th>Mail</th>
                        <th>Téléphone</th>
                    </tr>
        <?php
            // requête sql pour afficher pour afficher les personnes
            $sel = $bdd->query('SELECT * FROM personne');
            $personnes=$sel->fetchAll();
            foreach($personnes as $personne){
                ?>              
                    <tr>
                        <td><?php echo $personne['nomPersonne'];?></td>
                        <td><?php echo $personne['prenomPersonne'];?></td>
                        <td><?php echo $personne['adresse'];?></td>
                        <td><?php echo $personne['mail'];?></td>
                        <td><?php echo $personne['telephone'];?></td>
                    </tr>            
        <?php
            };
        ?>
        </table> 
        
    </body>
    </html>
<?php } else { header("Location: index.php");
 } ?>
