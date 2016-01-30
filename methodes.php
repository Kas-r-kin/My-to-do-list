<?php

	function readtask($nom_tache, $type, $lang, $TXT_TASK, $TXT_DATE_DEB, $TXT_DATE_FIN, $TXT_CONT) 
	{	
		switch ($type) 
		{
			case 1:
				$fic = fopen("./Taches/TacheEnCours.txt", "r");
				$retour = "accueil.php?lang=$lang";
			break;
			
			case 2:
				$fic = fopen("./Taches/TacheAFaire.txt", "r");
				$retour = "Tafaire.php?lang=$lang";
			break;
			
			case 3:
				$fic = fopen("./Taches/TacheTermine.txt", "r");
				$retour = "Ttermine.php?lang=$lang";
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
				
				echo "$TXT_TASK: $nom_tache";
				echo "</br>";
				echo "$TXT_DATE_DEB: $date_debut";
				echo "</br>";
				echo "$TXT_DATE_FIN: $date_fin";
				echo "</br>";
				echo "</br>";
				echo "$TXT_CONT:";
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
	
	
	function replacetask($typeavant, $typeapres, $titre, $Ndatedeb, $Ndatefin, $Ncontenu, $Adatedeb, $Adatefin, $Acontenu) 
	{	
		
		//If the task keep the same type
		if($typeavant == $typeapres)
		{
				//Need to find in which file the task is registered
				switch ($typeavant) 
			{
				case 1:
					$fic1 = fopen("./Taches/TacheEnCours.txt", "r+");
					$fic2 = fopen("./Taches/TitreEnCours.txt", "r+");		
					$retour = "accueil.php";
					$nom1 = "./Taches/TacheEnCours.txt";
					$nom2 = "./Taches/TitreEnCours.txt";
				break;
				
				case 2:
					$fic1 = fopen("./Taches/TacheAFaire.txt", "r+");
					$fic2 = fopen("./Taches/TitreAFaire.txt", "r+");
					$retour = "Tafaire.php";
					$nom1 = "./Taches/TacheAFaire.txt";
					$nom2 = "./Taches/TitreAFaire.txt";
				break;
				
				case 3:
					$fic1 = fopen("./Taches/TacheTermine.txt", "r+");
					$fic2 = fopen("./Taches/TitreTermine.txt", "r+");
					$retour = "Ttermine.php";
					$nom1 = "./Taches/TacheTermine.txt";
					$nom2 = "./Taches/TitreTermine.txt";
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
		$tailleNcontenu = count($ArrayNcontenu);
			
		for($i = $num_ligne_titre; $i < $tailleNcontenu; $i++)
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
					$fic1 = fopen("./Taches/TacheEnCours.txt", "r+");
					$fic2 = fopen("./Taches/TitreEnCours.txt", "r+");		
					$nom1 = "./Taches/TacheEnCours.txt";
					$nom2 = "./Taches/TitreEnCours.txt";
				break;
				
				case 2:
					$fic1 = fopen("./Taches/TacheAFaire.txt", "r+");
					$fic2 = fopen("./Taches/TitreAFaire.txt", "r+");
					$nom1 = "./Taches/TacheAFaire.txt";
					$nom2 = "./Taches/TitreAFaire.txt";
				break;
				
				case 3:
					$fic1 = fopen("./Taches/TacheTermine.txt", "r+");
					$fic2 = fopen("./Taches/TitreTermine.txt", "r+");
					$nom1 = "./Taches/TacheTermine.txt";
					$nom2 = "./Taches/TitreTermine.txt";
				break;
			}
			
			//... and in which file it will be registered
			switch ($typeapres) 
			{
				case 1:
					$fic3 = fopen("./Taches/TacheEnCours.txt", "a+");
					$fic4 = fopen("./Taches/TitreEnCours.txt", "a+");		
					$retour = "accueil.php";
					$nom3 = "./Taches/TacheEnCours.txt";
					$nom4 = "./Taches/TitreEnCours.txt";
				break;
				
				case 2:
					$fic3 = fopen("./Taches/TacheAFaire.txt", "a+");
					$fic4 = fopen("./Taches/TitreAFaire.txt", "a+");
					$retour = "Tafaire.php";
					$nom3 = "./Taches/TacheAFaire.txt";
					$nom4 = "./Taches/TitreAFaire.txt";
				break;
				
				case 3:
					$fic3 = fopen("./Taches/TacheTermine.txt", "a+");
					$fic4 = fopen("./Taches/TitreTermine.txt", "a+");
					$retour = "Ttermine.php";
					$nom3 = "./Taches/TacheTermine.txt";
					$nom4 = "./Taches/TitreTermine.txt";
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
	
	
	
	function inserttask($titre, $datedeb, $datefin, $contenu, $type) 
	{	
		switch ($type) 
		{
			case 1:
				$fic1 = fopen("./Taches/TacheEnCours.txt", "a+");
				$fic2 = fopen("./Taches/TitreEnCours.txt", "a+");		
				$retour = "accueil.php";
			break;
			
			case 2:
				$fic1 = fopen("./Taches/TacheAFaire.txt", "a+");
				$fic2 = fopen("./Taches/TitreAFaire.txt", "a+");
				$retour = "Tafaire.php";
			break;
			
			case 3:
				$fic1 = fopen("./Taches/TacheTermine.txt", "a+");
				$fic2 = fopen("./Taches/TitreTermine.txt", "a+");
				$retour = "Ttermine.php";
			break;
        }
			
			fprintf($fic1, "\n");
			fprintf($fic1, "#");
			fprintf($fic1, $titre);
			fprintf($fic1, "\n");
			fprintf($fic1, $datedeb);
			fprintf($fic1, "\n");
			fprintf($fic1, $datefin);
			fprintf($fic1, "\n");
			fprintf($fic1, $contenu);
			fprintf($fic1, "\n");
			
			fprintf($fic2, $titre);
			fprintf($fic2, "\n");
			
			fclose($fic1);
			fclose($fic2);
			
			return $retour;
	}
	
	
	function changetask($titre, $typetache, $lang, $TXT_MOD, $TXT_TYPE, $TXT_DATE_DEB, $TXT_DATE_FIN, $TXT_OBJ, $TXT_VALID) 
	{	
		switch ($typetache) 
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

			$array = array("#", $titre);

			if(substr($balayage, 0, 1) == "#" && !strcmp($balayage, implode("", $array)))
			{

				fscanf($fic, "%s", $datedeb);
				fscanf($fic, "%s", $datefin);
				
				$contenu = "";
				$balayage = fgets($fic);
				
				while(!feof($fic) && substr($balayage, 0, 1) != "#")
				{
					
					$array = array("", $contenu, $balayage);
					$contenu = implode(" ", $array);
					
					$balayage = fgets($fic);
					
					
					
				}
				
				echo "<h1>$TXT_MOD</h1>";
				echo "<p>$titre</p>";
				
		echo "<form method=\"post\" action=\"RemplacementTache.php?Type=$typetache&amp;titre=$titre&amp;Adatedeb=$datedeb&amp;Adatefin=$datefin&amp;Acontenu=$contenu&amp;lang=$lang\">";
		echo "<p class=\"Interface\">";
    			
    			echo "<p>$TXT_TYPE</p>";
    			echo "<label for=\"typetache\"></label>";
   			    echo "<input type=\"typetache\" name=\"typetache\" id=\"typetache\" value=\"$typetache\" placeholder= \"En cours = 1 / A faire = 2\" /></br>";
 		      
				echo "<p>$TXT_DATE_DEB</p>";
    			echo "<label for=\"datedeb\"></label>";
   			    echo "<input type=\"datedeb\" name=\"datedeb\" id=\"datedeb\" value=\"$datedeb\" placeholder= \"Date de début\" /></br>";
   			    
   			    echo "<p>$TXT_DATE_FIN</p>";
   			    echo "<label for=\"datefin\"></label>";
   			    echo "<input type=\"datefin\" name=\"datefin\" id=\"datefin\" value=\"$datefin\" placeholder= \"Date de fin\" /></br>";
   			    

				
				
				echo "<p>$TXT_OBJ</p>";
   			    echo "<textarea name=\"Ncontenu\" rows=\"30\" cols=\"100\">\"$contenu\"</textarea></br>";
   			    
				echo "<input type=\"submit\" value=\"$TXT_VALID\" />";
		echo "</p>";
		echo "</form>";
				
				$validation = 1;
			}
		}
		fclose($fic);
		return $retour;
	}

?>
