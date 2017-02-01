<!DOCTYPE html>
<html>
    <head>
        <title>Comande de pizza</title>
        <meta charset="utf-8" />
        <meta name="description" content="Page de commande" />
    </head>
    <body>


        <h1>Pizza Time</h1>
        <hr/>
        <h2>Commande de Pizza</h2>

       	<?php
       	/*
		    date_default_timezone_set('Europe/Paris');
			$heure = (date('H'));
			
			if ($heure >= 10){
				echo "<p>Commandes terminées.</p>";
			}

			else {
		*/
	    ?>

        <p>Fin des commandes à 10h00.</p>


		<form method="post" action="commande.php">
			<input type="text" name="nom" placeholder="Votre nom" required/>
			<input type="text" name="choix" placeholder="Choix de pizza" required/>
			<input type="submit" value="Valider" />
		 
		</form>

		<?php
		/*
		}
		*/
		?>
		
		<h2>Liste des commande</h2>


		<?php

			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=pizza;charset=utf8', 'root', 'root');
			}
			catch (Exception $e)
			{
			        die('Erreur : ' . $e->getMessage());
			}

			$reponse = $bdd->query('SELECT * FROM commande');


			while ($donnees = $reponse->fetch())
			{
				echo '<strong>Commande n°' . $donnees['id'] . '</strong> ( ' . $donnees['nom'] . ' ) : ' . $donnees['choix'] . '<br />';
			}

			$reponse->closeCursor();

		?>


    </body>
</html>