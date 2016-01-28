<?php

	$typeapres = $_POST['typetache'];
	$Ndatedeb = $_POST['datedeb'];
	$Ndatefin = $_POST['datefin'];
	$Ncontenu = $_POST['Ncontenu'];
	
	$typeavant = $_GET['Type'];
	$titre = $_GET['titre'];
	$Adatedeb = $_GET['Adatedeb'];
	$Adatefin = $_GET['Adatefin'];
	$Acontenu = $_GET['Acontenu'];
		
	function replacetask($typeavant, $typeapres, $titre, $Ndatedeb, $Ndatefin, $Ncontenu, $Adatedeb, $Adatefin, $Acontenu) 
	{	
		
		//If the task keep the same type
		if($typeavant == $typeapres)
		{
				//Need to find in which file the task is registered
				switch ($typeavant) 
			{
				case 1:
					$fic1 = fopen("./TacheEnCours.txt", "r+");
					$fic2 = fopen("./TitreEnCours.txt", "r+");		
					$retour = "accueil.php";
					$nom1 = "./TacheEnCours.txt";
					$nom2 = "./TitreEnCours.txt";
				break;
				
				case 2:
					$fic1 = fopen("./TacheAFaire.txt", "r+");
					$fic2 = fopen("./TitreAFaire.txt", "r+");
					$retour = "Tafaire.php";
					$nom1 = "./TacheAFaire.txt";
					$nom2 = "./TitreAFaire.txt";
				break;
				
				case 3:
					$fic1 = fopen("./TacheTermine.txt", "r+");
					$fic2 = fopen("./TitreTermine.txt", "r+");
					$retour = "Ttermine.php";
					$nom1 = "./TacheTermine.txt";
					$nom2 = "./TitreTermine.txt";
				break;
			}
		
		
		$validation = 0;
			
		$ArrayFile = file_get_contents($nom1);
			
		$i=0;
			
		//Locate the beginning and ending lines of the task to change
			
		while($validation == 0 && !feof($fic1))
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
			
			
		//Modify the predefined block of the task
			
		$ArrayFile = explode(PHP_EOL, $ArrayFile);
			
		$ArrayNcontenu = explode(PHP_EOL, $Ncontenu);
			
		$ArrayFile[$num_ligne_titre + 1] = $Ndatedeb;
		$ArrayFile[$num_ligne_titre + 2] = $Ndatefin;
			
			
		$var = count($ArrayFile)-1;
			
		for($i = 0; $i < $tailleNcontenu; $i++)
		{
			$var = $num_ligne_titre + 3 + $i;
			$ArrayFile[$var] = substr($ArrayNcontenu[$i], 0, strlen($ArrayNcontenu[$i]));
		}
			

			
		$ArrayFile = array_values($ArrayFile);			
		$ArrayFile = implode(PHP_EOL, $ArrayFile);
			
		echo "$ArrayFile";
		echo "</br>";
			
		//Overwrite the new document with the modified task
			
		$fic1 = fopen("$nom1", "w+");
			
			
		fprintf($fic1, $ArrayFile);
		fprintf($fic1, "\n");
			
		fclose($fic1);
			
			
		return $retour;
		}
		
		
		
		
		
		
		
		//If the task is changing of type
		else
		{
				//Need to find in which file the task is registered...
				switch ($typeavant) 
				{
				case 1:
					$fic1 = fopen("./TacheEnCours.txt", "r+");
					$fic2 = fopen("./TitreEnCours.txt", "r+");		
					$nom1 = "./TacheEnCours.txt";
					$nom2 = "./TitreEnCours.txt";
				break;
				
				case 2:
					$fic1 = fopen("./TacheAFaire.txt", "r+");
					$fic2 = fopen("./TitreAFaire.txt", "r+");
					$nom1 = "./TacheAFaire.txt";
					$nom2 = "./TitreAFaire.txt";
				break;
				
				case 3:
					$fic1 = fopen("./TacheTermine.txt", "r+");
					$fic2 = fopen("./TitreTermine.txt", "r+");
					$nom1 = "./TacheTermine.txt";
					$nom2 = "./TitreTermine.txt";
				break;
			}
			
			//... and in which file it will be registered
			switch ($typeapres) 
			{
				case 1:
					$fic3 = fopen("./TacheEnCours.txt", "a+");
					$fic4 = fopen("./TitreEnCours.txt", "a+");		
					$retour = "accueil.php";
					$nom3 = "./TacheEnCours.txt";
					$nom4 = "./TitreEnCours.txt";
				break;
				
				case 2:
					$fic3 = fopen("./TacheAFaire.txt", "a+");
					$fic4 = fopen("./TitreAFaire.txt", "a+");
					$retour = "Tafaire.php";
					$nom3 = "./TacheAFaire.txt";
					$nom4 = "./TitreAFaire.txt";
				break;
				
				case 3:
					$fic3 = fopen("./TacheTermine.txt", "a+");
					$fic4 = fopen("./TitreTermine.txt", "a+");
					$retour = "Ttermine.php";
					$nom3 = "./TacheTermine.txt";
					$nom4 = "./TitreTermine.txt";
				break;
			}
			
			
			$validation = 0;
			
			$ArrayFile = file_get_contents($nom1);
			
			$i=0;
			
			//Locate the beginning and ending lines of the task to change
			
			while($validation == 0 && !feof($fic1))
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
			
			$ArrayNcontenu = explode(PHP_EOL, $Ncontenu);
		
			
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
			
			
			while($validation == 0 && !feof($fic2))
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
			
			
			
			
			//Then write the new task in the corresponding type of title file and comment file
			
			fprintf($fic3, "\n");
			fprintf($fic3, "#");
			fprintf($fic3, $titre);
			fprintf($fic3, "\n");
			fprintf($fic3, $Ndatedeb);
			fprintf($fic3, "\n");
			fprintf($fic3, $Ndatefin);
			fprintf($fic3, "\n");
			fprintf($fic3, $Ncontenu);
			fprintf($fic3, "\n");
			
			fprintf($fic4, $titre);
			fprintf($fic4, "\n");
			
			fclose($fic3);
			fclose($fic4);
			
			return $retour;
		}
			
	}
			
		
	
	$retour = replacetask($typeavant, $typeapres, $titre, $Ndatedeb, $Ndatefin, $Ncontenu, $Adatedeb, $Adatefin, $Acontenu);
	
	
	header("Location: http://fc.isima.fr/~rophelizon/devweb_projet/$retour");
		
		
?>
