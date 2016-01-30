<html>
	<body>

	<?php
	
		if ($_GET['lang'] == 'fr')	// si la langue est 'fr' (français) on inclut le fichier fr-lang.php
	{   
		$lang = 'fr';
		include('lang/fr-lang.php');
	}
	else 
	{
		if ($_GET['lang'] == 'en')
		{
			$lang = 'en';
			include('lang/en-lang.php');
		}
		else
		{
			$lang = 'fr';
			include('lang/fr-lang.php');
		}
	}
	
		$nom_tache = $_GET['Tache'];
		$type = $_GET['type'];
	
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
	
	changetask($nom_tache, $type, $lang, $TXT_MOD, $TXT_TYPE, $TXT_DATE_DEB, $TXT_DATE_FIN, $TXT_OBJ, $TXT_VALID);
	
	?>

	</body>
</html>
