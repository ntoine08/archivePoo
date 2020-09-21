
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>ARCHIVE</title>
</head>

<body  class="<?php if(isset($_COOKIE['bg'])){
    echo $_COOKIE['bg'];};?>">
    <!-- liste des personnes-->
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

    <?php

if(!isset($_COOKIE['bg'])) {
    echo "
    <h3>choisir le fond d'ecran</h3>
    <a  href='../function/cookie.php?color=bg-success' class='btn btn-success'>VERT</a>
    <a  href='../function/cookie.php?color=bg-primary' class='btn btn-primary'>BLEU</a>
    <a  href='../function/cookie.php?color=bg-danger' class='btn btn-danger'>ROUGE</a>";
};
?>

    <h1>AFFICHER</h1>
        <?php
        // requête sql pour afficher la liste des personnes dans l'ordre par id
            $sel = $bdd->query('SELECT id_personne, nomPersonne, prenomPersonne, adresse, mail, telephone FROM personne ORDER BY id_personne');
            $personnes=$sel->fetchAll();
            foreach($personnes as $personne){ ?>
            <div class="p3">
                <!-- formulaire pour modifier ou supprimer la personne relié au controller -->
                <form method="post" action="../controllers/modif.php?id=<?= $personne['id_personne']; ?>">
                    <input type="text" name="nomPersonne" value="<?= $personne['nomPersonne']; ?>" placeholder="NOM">
                    <input type="text" name="prenomPersonne" value="<?= $personne['prenomPersonne']; ?>" placeholder="PRENOM">
                    <input type="text" name="adresse" value="<?= $personne['adresse']; ?>" placeholder="ADRESSE">
                    <input type="text" name="mail" value="<?= $personne['mail']; ?>" placeholder="MAIL">
                    <input type="text" name="telephone" value="<?= $personne['telephone']; ?>" placeholder="TELEPHONE">
                    <button type="submit">Envoyer</button>
                </form>

                    <a href="../controllers/delete.php?id=<?= $personne['id_personne'] ?>">supprimer</a>
                    
            </div>
          <?php  }; ?>
    
    <!--ajouter des affectations-->
    <h1>Ajouter affectations</h1>
        <div class="p2">
            <!-- formulaire pour crée les affectations relié au controller -->
            <form method="post" action="../controllers/add-affectation.php">
                <?php
                    //requête sql pour afficher toute les personnes dans le menu déroulant
                    $sql = "SELECT id_personne, nomPersonne, prenomPersonne FROM personne";
                    $perso = $bdd->prepare($sql);
                    $perso->execute();
                            
                ?>

                <p>Nom de la personne :</p>
                <select name="perso" id="perso_select">

                    <?php foreach ($perso as $row) { ?>

                    <option value=" <?php echo $row['id_personne']; ?> ">
                        <?php echo $row['id_personne']; ?>

                        <?php echo $row['nomPersonne']; ?>
                        <?php echo $row['prenomPersonne']; ?>
                    </option>
                    <?php } ?>
                </select>


                <?php
                    //requête sql pour afficher tute les zones dans le menu déroulant
                    $sqls = "SELECT id_zone, nomZone FROM zone";
                    $zon = $bdd->prepare($sqls);
                    $zon->execute();
                            
                ?>
                <p>nom de la zone :</p>
                <select name="zon" id="zon_select">

                    <?php foreach ($zon as $rows) { ?>

                    <option value=" <?php echo $rows['id_zone']; ?> ">
                        <?php echo $rows['id_zone']; ?>

                        <?php echo $rows['nomZone']; ?>
                    </option>
                    <?php } ?>
                </select>

                <button type="submit">Envoyer</button>
            </form>
        </div>

    <!--afficher les affectations-->

    <h1>Liste des affectations</h1>
    <!-- tableau pour afficher toute les affectations -->
    <table class="t2">
        <tr>
            <th>Nom de la personne</th>
            <th>Prénom de la personne</th>
            <th>Nom de la zone</th>
            <th></th>
        </tr>
        <?php
        // requête sql pour afficher toute les affectations
            $tab = $bdd->query('SELECT gerer.id_personne, nomPersonne, prenomPersonne, nomZone 
                                FROM gerer
                                JOIN personne on personne.id_personne = gerer.id_personne 
                                JOIN zone on zone.id_zone = gerer.id_zone');
            $aff = $tab->fetchAll();
            foreach($aff as $af){
        ?>
        <tr>
            <td><?= $af['nomPersonne'];?></td>
            <td><?= $af['prenomPersonne'];?></td>
            <td><?= $af['nomZone'];?></td>
            <!-- bouton pour supprimer les affectations, relié au controller -->
            <td><a href="../controllers/delete-affectation.php?id_personne=<?= $af['id_personne']; ?>">supprimer</a></td>
        </tr>

        <?php
    };
?>

    </table>

</body>
</html>
<?php } else { header("Location: index.php");
 } ?>