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

		$titre = $_POST['titre'];
		$typetache = $_POST['typetache'];
		$datedeb = $_POST['datedeb'];
		$datefin = $_POST['datefin'];
		$contenu = $_POST['contenu'];
		
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
	
		$retour = inserttask($titre, $datedeb, $datefin, $contenu, $typetache);
		
		header("Location: http://fc.isima.fr/~rophelizon/devweb_projet/$retour?lang=$lang");
		
?>
