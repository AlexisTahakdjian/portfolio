<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		try
		{
			$host = 'localhost';
			$db = 'portfolio';
			$user = 'root';
			$password = 'root';
			$pdo = new PDO('mysql:host=localhost;dbname=portfolio; charset=utf8', $user, $password);
			
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}

		//Envoyer le message
		$req = $pdo->prepare('INSERT INTO contact (name, email, message, date) VALUES(?, ?, ?, NOW())');
		$resultat = $req->execute(array($_POST['name'], $_POST['email'], $_POST['message']));
	

		
		//on vérifie si le message est bien envoyé 
		if ($resultat){
			echo "<p>Le message a été envoyé</p>";}
		else{
			echo "<p>Erreur</p>";}
	
		
		//Afficher les messages (pout le test)
		$reponse = $pdo->query('SELECT * FROM contact');
		while ($donnees = $reponse->fetch())
		{
			echo '<p><strong>' . htmlspecialchars($donnees['name']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
		}

	?>
</body>
</html>