<?php

    function addClient(){

        try {
            $bdd = new connectDb();
            $reponse = $bdd->connect();
        } catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        $nom = $_POST['nom'];
        $descriptionClient = $_POST['description'];

        $ajout = $reponse->prepare('INSERT INTO client (`nom`, `description`) VALUES (?, ?)');
        $ajout->execute(array($nom, $descriptionClient));

    }

?>