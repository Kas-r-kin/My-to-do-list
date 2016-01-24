<!-- L'appel de GestionTache.php ne modifie rien... -->

<html>
	<body>

	<?php
	
		$nom_tache = $_GET['Tache'];
		$type = $_GET['type'];
	
	function changetask($titre, $typetache) 
	{	
		switch ($typetache) 
		{
			case 1:
				$fic = fopen("./TacheEnCours.txt", "r");
				$retour = "accueil.php";
			break;
			
			case 2:
				$fic = fopen("./TacheAFaire.txt", "r");
				$retour = "Tafaire.php";
			break;
			
			case 3:
				$fic = fopen("./TacheTermine.txt", "r");
				$retour = "Ttermine.php";
			break;
        }
		$validation = 0;

		while($validation == 0 && !feof($fic))
		{	
			fscanf($fic, "%s", $balayage);

			$array = array("#", $titre);

			if(substr($balayage, 0, 1) == "#" && !strcmp($balayage, implode("", $array)))
			{

				fscanf($fic, "%s", $datedeb);
				fscanf($fic, "%s", $datefin);
				
				echo "<h1>Modification de tâche</h1>";
				
		echo "<form method=\"post\" action=\"GestionTache.php\">";
		echo "<p class=\"Interface\">";
				
				echo "<p>Titre</p>";
   			    echo "<label for=\"titre\"></label>";
    			echo "<input type=\"text\" name=\"titre\" id=\"titre\" value= \"$titre\" placeholder= \"Titre\" /></br>";
    			
    			echo "<p>Type de tâche</p>";
    			echo "<label for=\"typetache\"></label>";
   			    echo "<input type=\"typetache\" name=\"typetache\" id=\"typetache\" value=\"$typetache\" placeholder= \"En cours = 1 / A faire = 2\" /></br>";
 		      
				echo "<p>Date de début</p>";
    			echo "<label for=\"datedeb\"></label>";
   			    echo "<input type=\"datedeb\" name=\"datedeb\" id=\"datedeb\" value=\"$datedeb\" placeholder= \"Date de début\" /></br>";
   			    
   			    echo "<p>Date de fin</p>";
   			    echo "<label for=\"datefin\"></label>";
   			    echo "<input type=\"datefin\" name=\"datefin\" id=\"datefin\" value=\"$datefin\" placeholder= \"Date de fin\" /></br>";
   			    

				$contenu = "";
				$balayage = fgets($fic);
				
				while(!feof($fic) && substr($balayage, 0, 1) != "#")
				{
					
					$array = array("", $contenu, $balayage);
					$contenu = implode(" ", $array);
					
					$balayage = fgets($fic);
					
					
					
				}
				
				echo "<p>Objectifs</p>";
   			    echo "<textarea name=\"contenu\" rows=\"30\" cols=\"100\">\"$contenu\"</textarea></br>";
   			    
				echo "<input type=\"submit\" value=\"Valider\" />";
		echo "</p>";
		echo "</form>";
				
				$validation = 1;
			}
		}
		fclose($fic);
		return $retour;
	}
	
	changetask($nom_tache, $type);
	
	?>

	</body>
</html>
