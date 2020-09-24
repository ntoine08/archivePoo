
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
<!-- vérifier si il y'a un cookie -->
<body  class="<?php if(isset($_COOKIE['bg'])){
    echo $_COOKIE['bg'];};?>">

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
 // choisir le fond d'écran avec le cookie
if(!isset($_COOKIE['bg'])) {
    echo "
    <h3>choisir le fond d'ecran</h3>
    <a  href='../function/cookie.php?color=bg-success' class='btn btn-success'>VERT</a>
    <a  href='../function/cookie.php?color=bg-primary' class='btn btn-primary'>BLEU</a>
    <a  href='../function/cookie.php?color=bg-danger' class='btn btn-danger'>ROUGE</a>";
};
?>

    <h1>Archive Dep08</h1>

    <div class="p1">
        <div class="sp1">
            <!-- ajouter personne-->
            <h2>Ajouter Personne</h2>
            <!-- formulaire crée pour ajouter les personnes relié au controller -->
            <form method="post" action="../controllers/form_personne.php">
                <table class="t1">
                    <tr>
                        <td>nom</td>
                        <td><input type="text" name="nomPersonne" placeholder="Ex : bob"></td>
                    </tr>
                    <tr>
                        <td>Prénom</td>
                        <td><input type="text" name="prenomPersonne" placeholder="Ex : 20 ans"></td>
                    </tr>
                    <tr>
                        <td>Adresse</td>
                        <td><input type="text" name="adresse" placeholder="Ex : 1, rue des aubépines"></td>
                    </tr>
                    <tr>
                        <td>Mail</td>
                        <td><input type="text" name="mail" placeholder="Ex : bob@mail.net"></td>
                    </tr>
                    <tr>
                        <td>Téléphone</td>
                        <td><input type="text" name="telephone" placeholder="Ex :  00 00 00 00 00"></td>
                    </tr>
                    <tr>
                        <td>Pseudo</td>
                        <td><input type="text" name="pseudo" placeholder="Ex :  ricky"></td>
                    </tr>
                    <tr>
                        <td>Mot de passe</td>
                        <td><input type="password" name="mdp" placeholder="Ex :  *********"></td>
                    </tr>
                </table>
                <button type="submit">Envoyer</button>
            </form>

            <a href="personne.php">Voir</a>
        </div>

        <div class="sp1">
            <!-- ajouter document-->
            <h2>Ajouter Document</h2>
            <!-- formulaire crée pour ajouter les documents relié au controller -->
            <form method="post" action="../controllers/add-doc.php">
                <p>Sélectionner votre étagères</p>
                    <?php
                    // requête sql pour afficher les étagères dans le menu déroulant
                        $sql = "SELECT id_etagere, nomEtagere FROM etagere";
                        $statement = $bdd->prepare($sql);
                        $statement->execute();
                    ?>

                <select name="doc" id="doc_select">
                    <!-- boucle foreach pour afficher toute les données du menu déroulant -->
                    <?php foreach ($statement as $row) { ?>
                    <option value=" <?php echo $row['id_etagere']; ?> ">
                        <?php echo $row['id_etagere']; ?>
                        étagère nom :
                        <?php echo $row['nomEtagere']; ?>
                    </option>
                    <?php } ?>
                </select>

                <p>Sélectionner la personne</p>
                    <?php
                    //requête sql pour afficher les personnes dans le menu déroulant
                        $sql = "SELECT id_personne, nomPersonne, prenomPersonne FROM personne";
                        $statement = $bdd->prepare($sql);
                        $statement->execute();
                    ?>

                <select name="pers" id="pers_select">
                    <!-- boucle foreach pour afficher toute les données du menu déroulant -->
                    <?php foreach ($statement as $row) { ?>
                    <option value=" <?php echo $row['id_personne']; ?> ">
                        <?php echo $row['id_personne']; ?>
                        personne nom :
                        <?php echo $row['nomPersonne']; ?>
                        <?php echo $row['prenomPersonne']; ?>
                    </option>
                    <?php } ?>
                </select>

                <p>nom :</p>

                <input type="text" name="nomDocument" placeholder="Ex : Normandie">
                <br><br>

                <button type="submit">Envoyer</button><br><br>
            </form>
            <a href="document.php">Voir</a>
        </div>
    </div>

    <div class="p1">
        <div class="sp1">
            <!-- ajouter zone -->
            <h2>Ajouter Zone</h2>
            <!-- formulaire crée pour ajouter les zones relié au controller -->
            <form method="post" action="../controllers/add-zone.php">
                <p>Sélectionner votre lieu de stockage</p>
                    <?php
                    // requête sql pour afficher le lieu de stockage dans le menu déroulant
                        $sqls = "SELECT id_stockage, nomLieu FROM lieustockage";
                        $stockage = $bdd->prepare($sqls);
                        $stockage->execute();
                            
                    ?>

                <select name="zone" id="zone_select">
                    <!-- boucle foreach pour afficher toute les données du menu déroulant -->
                    <?php foreach ($stockage as $rows) { ?>
                    <option value=" <?php echo $rows['id_stockage']; ?> ">
                        <?php echo $rows['id_stockage']; ?>
                        Stockage nom :
                        <?php echo $rows['nomLieu']; ?>
                    </option>
                    <?php } ?>
                </select>

                <p>nom :</p>
                <input type="text" name="nomZone" placeholder="Ex : Normandie">

                <button type="submit">Envoyer</button>
            </form>
            <a href="zone.php">Voir</a>
        </div>

        <div class="sp1">
            <!--ajouter etagere-->
            <h2>Ajouter Etagère</h2>
            <!-- formulaire crée pour ajouter les étagères relié au controller -->
            <form method="post" action="../controllers/add-etagere.php">
                <p>Sélectionner votre zone</p>
                    <?php
                    // requête sql pour afficher les zones dans le menu déroulant
                        $sql = "SELECT id_zone, nomZone FROM zone";
                        $zone = $bdd->prepare($sql);
                        $zone->execute();
                                
                    ?>

                <select name="etagere" id="etagere_select">
                    <!-- boucle foreach pour afficher toute les données du menu déroulant -->
                    <?php foreach ($zone as $rowz) { ?>
                    <option value=" <?php echo $rowz['id_zone']; ?> ">
                        <?php echo $rowz['id_zone']; ?>
                        Zone nom :
                        <?php echo $rowz['nomZone']; ?>
                    </option>
                    <?php } ?>
                </select>
                <p>nom :</p>
                <input type="text" name="nomEtagere" placeholder="Ex : Normandie">

                <button type="submit">Envoyer</button>
            </form>
            <a href="etagere.php">Voir</a>
        </div>
    </div>

</body>

</html>
<!-- si pas connecter renvoi vers la page de connexion -->
<?php } else { header("Location: index.php");
 } ?>