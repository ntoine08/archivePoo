
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>ARCHIVE</title>
</head>


<body  class="<?php if(isset($_COOKIE['bg'])){
    echo $_COOKIE['bg'];};?>">

    <?php
            include 'function/connexion.php';
        ?>
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

    <?php
 // After submitting the form we do not yet have the cookie set, but we can learn desired color from form submission
//  if ($_COOKIE["color"] || $_GET['color'])
//    $bgcolor=$_COOKIE["color"] ? $_COOKIE["color"] : $_GET['color'];
//  else
//    $bgcolor="FFFBFB";
//  echo "<body bgcolor='$bgcolor'>";

if(!isset($_COOKIE['bg'])) {
    echo "
    <h3>choisir le fond d'ecran</h3>
    <a  href='function/cookie.php?color=bg-success' class='btn btn-success'>VERT</a>
    <a  href='function/cookie.php?color=bg-primary' class='btn btn-primary'>BLEU</a>
    <a  href='function/cookie.php?color=bg-danger' class='btn btn-danger'>ROUGE</a>";
};
?>

    <?php
//  if (!($_COOKIE["color"] || $_GET['color'])) {
//    echo "We noticed you have not selected a background color. Please select from one of the options below.<p>";
//    echo "
// <form>
//   Background Color<p>

// <input type='radio' name='color' value='pink'><font color='pink'>pink</font><p>
// <input type='radio' name='color' value='lightblue'><font color='lightblue'>light blue</font><p>
// <input type='radio' name='color' value='lightgreen'><font color='lightgreen'>light green</font><p>
// <input type='submit'>
// </form>
//   ";
//  }
 
 ?>
    <h1>Archive Dep08</h1>

    <div class="p1">
        <div class="sp1">
            <!-- ajouter personne-->
            <h2>Ajouter Personne</h2>

            <form method="post" action="function/add-person.php">
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

            <form method="post" action="function/add-doc.php">
                <p>Sélectionner votre étagères</p>
                <?php
                            $sql = "SELECT id_etagere, nomEtagere FROM etagere";
                            $statement = $bdd->prepare($sql);
                            $statement->execute();
                            // var_dump($statement);
                        ?>

                <select name="doc" id="doc_select">
                    <?php foreach ($statement as $row) { ?>
                    <option value=" <?php echo $row['id_etagere']; ?> ">
                        <?php echo $row['id_etagere']; ?>
                        étagère nom :
                        <?php echo $row['nomEtagere']; ?>
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

            <form method="post" action="function/add-zone.php">
                <p>Sélectionner votre lieu de stockage</p>
                <?php
                        $sqls = "SELECT id_stockage, nomStockage FROM lieustockage";
                        $stockage = $bdd->prepare($sqls);
                        $stockage->execute();
                            
                    ?>

                <select name="zone" id="zone_select">
                    <?php foreach ($stockage as $rows) { ?>
                    <option value=" <?php echo $rows['id_stockage']; ?> ">
                        <?php echo $rows['id_stockage']; ?>
                        Stockage nom :
                        <?php echo $rows['nomStockage']; ?>
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

            <form method="post" action="function/add-etagere.php">
                <p>Sélectionner votre zone</p>
                <?php
                    $sql = "SELECT id_zone, nomZone FROM zone";
                    $zone = $bdd->prepare($sql);
                    $zone->execute();
                            
                ?>

                <select name="etagere" id="etagere_select">
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
<?php } else { header("Location: index.php");
 } ?>