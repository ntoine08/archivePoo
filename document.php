<?php
session_start();
if (isset($_SESSION['id_personne']) AND isset($_SESSION['pseudo']))
{

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
    <ul class="index">
        <li><a href="accueil.php">Accueil</a></li>
        <li><a href="admin.php">Admin</a></li>
        <li><a href="function/logout.php">Se déconnecter <?php
                            if (isset($_SESSION['id_personne']) AND isset($_SESSION['pseudo']))
                            {
                                echo $_SESSION['pseudo'];
                            } ?>
            </a></li>
    </ul>

    <h1>Liste des documents</h1>
    <table class="t2">
                    <tr>
                        <th>Nom du document</th>
                        <th>Nom de l'étagère</th>
                    </tr>
        
        
        <?php
            include 'function/connexion.php';  
             
            $sel = $bdd->query('SELECT nomDocument, nomEtagere 
                                FROM document 
                                LEFT JOIN etagere 
                                ON document.id_etagere = etagere.id_etagere 
                                ORDER BY document.id_etagere');
            $documents = $sel->fetchAll();
            foreach($documents as $document){
                ?>
                    <tr>
                        <td><?= $document['nomDocument'];?></td>
                        <td><?= $document['nomEtagere'];?></td>
                    </tr>
                                  
        <?php
            };
        ?>     
    </table> 

    </body>
    </html>
<?php } else { header("Location: index.php");
 } ?>
