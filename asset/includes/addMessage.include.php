<?php

	function addMessage(){

		try{
			$bdd = new connectDb();
			$reponse = $bdd->connect();
		} catch(Exception $e) {
			die('Erreur : ' . $e->getMessage());
		}
		$nom = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$add = $reponse->prepare('INSERT INTO contact (`name`, `email`, `message`) VALUES (?, ?, ?)');
		$add ->execute(array($nom, $email, $message));

	}

?>