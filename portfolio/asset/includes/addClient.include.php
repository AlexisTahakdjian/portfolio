<?php

    function addClient(){

        try {
            $bdd = new connectDb();
            $reponse = $bdd->connect();
        } catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        $titre = $_POST['titre'];
        $description = $_POST['message'];
        $url = $_POST['url'];
        $photo = $_POST['photo'];
        $traffic = $_POST['traffic'];
        $client = $_POST['client'];

        $ajout = $reponse->prepare('INSERT INTO add_project (`titre`, `Description`, `url`, `photo`, `traffic`, `client` ) VALUES (?, ?, ?, ?, ?, ?)');
        $ajout->execute(array($titre, $description, $url, $photo, $traffic, $client));

    }

?>