<html>
	<body>

	<?php
	
	$nom_tache = $_GET['Tache'];
	$type = $_GET['type'];
	
	function deletetask($titre, $typetache) 
	{

			//Locate the two files (title and content) to erase them
			switch ($typetache) 
			{
				case 1:
					$fic1 = fopen("./Taches/TacheEnCours.txt", "a+");
					$fic2 = fopen("./Taches/TitreEnCours.txt", "a+");		
					$retour = "accueil.php";
					$nom1 = "./Taches/TacheEnCours.txt";
					$nom2 = "./Taches/TitreEnCours.txt";
				break;
				
				case 2:
					$fic1 = fopen("./Taches/TacheAFaire.txt", "a+");
					$fic2 = fopen("./Taches/TitreAFaire.txt", "a+");
					$retour = "Tafaire.php";
					$nom1 = "./Taches/TacheAFaire.txt";
					$nom2 = "./Taches/TitreAFaire.txt";
				break;
				
				case 3:
					$fic1 = fopen("./Taches/TacheTermine.txt", "a+");
					$fic2 = fopen("./Taches/TitreTermine.txt", "a+");
					$retour = "Ttermine.php";
					$nom1 = "./Taches/TacheTermine.txt";
					$nom2 = "./Taches/TitreTermine.txt";
				break;
			}
			
			
			$validation = 0;
			
			$ArrayFile = file_get_contents($nom1);
			
			$i=0;
			
			//Locate the beginning and ending lines of the task to change
			
			while(!feof($fic1) && $validation == 0)
			{	
				fscanf($fic1, "%s", $balayage);
				$array = array("#", $titre);
				

				if(substr($balayage, 0, 1) == "#" && !strcmp($balayage, implode("", $array)))
				{
					$num_ligne_titre = $i;

					fscanf($fic1, "%s", $date_debut);
					fscanf($fic1, "%s", $date_fin);
				
					$balayage = fgets($fic1);
					$i = $i+3;
					
				
					while(!feof($fic1) && substr($balayage, 0, 1) != "#")
					{
						$balayage = fgets($fic1);
						$i++;
					}
				$num_ligne_fin = $i;
				$validation = 1;
				}
			
				$i++;
			}
			
			//Erase the task from the origin file
		
			$ArrayFile = explode(PHP_EOL, $ArrayFile);
			
			for($i = $num_ligne_titre; $i < $num_ligne_fin; $i++)
			{
				unset($ArrayFile[$i]);
			}

			$ArrayFile = array_values($ArrayFile);			
			$ArrayFile = implode(PHP_EOL, $ArrayFile);
		
			echo "$ArrayFile";
			echo "</br>";
		
			//Overwrite the first document with the deleted task
			
			$fic1 = fopen("$nom1", "w+");
			
			
			fprintf($fic1, $ArrayFile);
			
			fclose($fic1);
		
			
			
			
			
			//Same thing for the file including the tasks names
			
			$validation = 0;
			
			$ArrayFile = file_get_contents($nom2);
			
			$i=0;
			
			
			while(!feof($fic2) && $validation == 0)
			{	
				fscanf($fic2, "%s", $balayage);				

				if(!strcmp($balayage, $titre))
				{
					$num_ligne_titre = $i;

					$validation = 1;
				}
			
				$i++;
			}
			
			//Erase the task from the origin file
		
			$ArrayFile = explode(PHP_EOL, $ArrayFile);		
			

			unset($ArrayFile[$num_ligne_titre]);

			$ArrayFile = array_values($ArrayFile);			
			$ArrayFile = implode(PHP_EOL, $ArrayFile);
		
			//Overwrite the first title document with the deleted task
			
			$fic2 = fopen("$nom2", "w+");
			
			
			fprintf($fic2, $ArrayFile);
			
			fclose($fic2);
			
			return $retour;
			
	}
	


	$retour = deletetask($nom_tache, $type);
	
	header("Location: http://fc.isima.fr/~rophelizon/devweb_projet/$retour");
	
	?>

	</body>
</html>
