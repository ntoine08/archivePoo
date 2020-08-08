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
    <?php
            include 'function/connexion.php';

            
        ?>

    <div class="conn">
        <h1>Connexion</h1>
            <form class="login-form" method="POST" action="function/login.php">
            <input type="text" placeholder="pseudo" id="pseudo1" name="pseudo1"/>
            <input type="password" placeholder="Mdp" id="pass1" name="pass1"/>
            <button>connexion</button>
            </form>
    </div>
</body>
</html>