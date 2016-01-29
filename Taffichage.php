<html>
	<link rel="stylesheet" href="traitement.css" />
	<body>
		

<?php

		$nom_tache = $_GET['Tache'];
		$type = $_GET['type'];
		
	function readtask($nom_tache, $type) 
	{	
		switch ($type) 
		{
			case 1:
				$fic = fopen("./Taches/TacheEnCours.txt", "r");
				$retour = "accueil.php";
			break;
			
			case 2:
				$fic = fopen("./Taches/TacheAFaire.txt", "r");
				$retour = "Tafaire.php";
			break;
			
			case 3:
				$fic = fopen("./Taches/TacheTermine.txt", "r");
				$retour = "Ttermine.php";
			break;
        }
		$validation = 0;

		while($validation == 0 && !feof($fic))
		{	
			fscanf($fic, "%s", $balayage);

			$array = array("#", $nom_tache);

			if(substr($balayage, 0, 1) == "#" && !strcmp($balayage, implode("", $array)))
			{

				fscanf($fic, "%s", $date_debut);
				fscanf($fic, "%s", $date_fin);
				
				echo "Tache: $nom_tache";
				echo "</br>";
				echo "Date de début: $date_debut";
				echo "</br>";
				echo "Date de début: $date_fin";
				echo "</br>";
				echo "</br>";
				echo "Contenu de la tâche:";
				echo "</br>";
				
				$balayage = fgets($fic);
				
				while(!feof($fic) && substr($balayage, 0, 1) != "#")
				{
					echo $balayage;
					$balayage = fgets($fic);
					echo "</br>";
				}
				
				$validation = 1;
			}
		}
		fclose($fic);
		return $retour;
	}
	
		$retour = readtask($nom_tache, $type);	
		
		echo "<form method=\"post\" action=\"$retour\">";
			echo "<p class=\"Interface2\">";
				echo "<input type=\"submit\" value=\"Retour\" />";
			echo "</p>";
			
  		echo "<p>";
  		
  		echo "</p>"; 		
  		echo "</form>";
  		
  		
  		
  		echo "<form method=\"post\" action=\"ModifTache.php?Tache=$nom_tache&amp;type=$type\">";
			echo "<p class=\"Interface2\">";
				echo "<input type=\"submit\" value=\"Modifier\" />";
			echo "</p>";
			
  		echo "<p>";
		
		echo "</p>";
  		echo "</form>";
  		
  		
  		
  		echo "<form method=\"post\" action=\"SuppressionTache.php?Tache=$nom_tache&amp;type=$type\">";
			echo "<p class=\"Interface2\">";
				echo "<input type=\"submit\" value=\"Supprimer\" />";
			echo "</p>";
			
  		echo "<p>";
		
		echo "</p>";
  		echo "</form>";
  		
?>


	</body>
</html>
