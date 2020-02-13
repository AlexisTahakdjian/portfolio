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
            <input type="text" id="titre" name="titre" placeholder="Titre">
            <input type="textarea" id="message" name="message" placeholder="Message">
            <select name="client" id="client">
                <?php
                try {
                    $bdd = new connectDb();
                    $reponse = $bdd->connect();
                } catch(Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }
                $requser = $reponse->query("SELECT * FROM client");
                while ($client = $requser->fetch())
                {
                    echo "<option value=".$client['id'].">".$client['nom']."</option>";
                }
                ?>
            </select>
            <input type="url" id="url" name="url" placeholder="Url">
            <input type="text" id="photo" name="photo" placeholder="Photo">
            <select type="text" id="traffic" name="traffic" placeholder="Traffic-light">
                <option value="red">Rouge</option>
                <option value="orange">Orange</option>
                <option value="green">Vert</option>
            </select>
            <div class="boutton">
                <button type="submit">Ajouter un projet</button><button type="reset">Reset</button>
            </div>
        </form>
        <?php

        //Enregistrer le client
        require '../asset/includes/addProjet.include.php';

        if (isset($_POST['titre'])){

            addProjet();

        }

        if (count($_POST)>0) {

            echo "<p class='txt'>Le client a été enregistré!</p>";
        }
        ?>
    </main>
</body>
</html>


