<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout de nouveau projet</title>
    <!--CSS-->
    <link rel="stylesheet" href="../asset/style/admin.css">
    <!--Favicon-->
    <link rel="icon" href="../asset/img/Favicon.png" type="image/x-icon">

</head>
<body>
<main>
    <?php
    require '../asset/classes/Autoloader.class.php';
    Autoloader::register();
    ?>
    <h2>Ajout d'un nouveau projet</h2>
    <form method="post">
        <input type="text" id="nom" name="nom" placeholder="Nom du client">
        <input type="textarea" id="description" name="description" placeholder="Description du client">
        <div class="boutton">
            <button type="submit">Ajouter un client</button><button type="reset">Reset</button>
        </div>
    </form>
    <a href="./admin-projet.php">Ajouter un projet</a>
    <?php

    //Enregistrer le client
    require '../asset/includes/addClient.include.php';

    if (isset($_POST['nom'])){

        addClient();

    }

    if (count($_POST)>0) {

        echo "<p class='txt'>Le client a été enregistré!</p>";
    }
    ?>
</main>
</body>
</html>


