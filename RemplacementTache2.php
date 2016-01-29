<?php

	$typeavant = $_POST['typetache'];
	$Ndatedeb = $_POST['datedeb'];
	$Ndatefin = $_POST['datefin'];
	$Ncontenu = $_POST['Ncontenu'];
	
	$typeapres = $_GET['Type'];
	$titre = $_GET['titre'];
	$Adatedeb = $_GET['Adatedeb'];
	$Adatefin = $_GET['Adatefin'];
	$Acontenu = $_GET['Acontenu'];
		
	function replacetask($typeavant, $typeapres, $titre, $Ndatedeb, $Ndatefin, $Ncontenu, $Adatedeb, $Adatefin, $Acontenu) 
	{	
		
		if($typeavant == $typeapres)
		{
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
			
			echo "num ligne: $num_ligne_titre";
			echo "</br>";
			
			//Modify the predefined block of the task
			
			$ArrayFile = explode(PHP_EOL, $ArrayFile);
			
			$ArrayNcontenu = explode(PHP_EOL, $Ncontenu);
			$tailleNcontenu = count($ArrayNcontenu);
			
			/*for($i = $num_ligne_titre + 1; $i <= $num_ligne_fin; $i++)
			{
				unset($ArrayFile[$i]);
			}*/
			
			$ArrayFile[$num_ligne_titre + 1] = $Ndatedeb;
			$ArrayFile[$num_ligne_titre + 2] = $Ndatefin;
			
			
			$var = count($ArrayFile)-1;
			echo "</br>";
			
			echo "$var";
			echo "</br>";
			
			echo "taille contenu: $ArrayFile[$var]";
			echo "</br>";
			
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
			
			$fic1 = fopen("./TacheEnCours.txt", "w+");
			
			
			fprintf($fic1, $ArrayFile);
			fprintf($fic1, "\n");
			
			fclose($fic1);
			
			
			return $retour;
			

			
	}
			
		
	
	$retour = replacetask($typeavant, $typeapres, $titre, $Ndatedeb, $Ndatefin, $Ncontenu, $Adatedeb, $Adatefin, $Acontenu);
	
	
	header("Location: http://fc.isima.fr/~rophelizon/devweb_projet/$retour");
		
		
?>
