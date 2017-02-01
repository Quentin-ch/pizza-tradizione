<!DOCTYPE html>
<html>
<head>
        <title>Confirmation de commande</title>
        <meta charset="utf-8" />
        <meta name="description" content="Confirmation de commande de pizza" />
</head>
<body>

	<?php

		//On récupere les valeurs du formulaire

		$nom = $_POST['nom'];
		$choix = $_POST['choix'];

		if ($_POST['nom'] != NULL AND $_POST['choix'] != NULL) // On a le nom et le choix
		{
			try // Connexion BDD
			{
				$bdd = new PDO('mysql:host=localhost;dbname=pizza;charset=utf8', 'root', 'root');

			}


			catch (Exception $e)
			{
			        die('Erreur : ' . $e->getMessage());
			}

			// Insertion des données

			$req = $bdd->prepare('INSERT INTO commande(nom, choix, date_commande ) VALUES(:nom, :choix, NOW())');
			$req->execute(array(
				'nom' => $nom,
				'choix' => $choix,
				));

			echo "Votre commande à bien été prise en compte !";

		}

		else // Il manque des paramètres, on avertit le visiteur
		{
			echo 'Commande incomplète !';
		}



	?>

</body>
</html>