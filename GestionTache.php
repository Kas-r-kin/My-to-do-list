<!--La fonction écrit bien dans les fichiers, mais ils ne tiennent compte de la modification QUE lorsqu'un utilisateur les as modifiés manuellement...-->

<?php

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
				$fic1 = fopen("./TacheEnCours.txt", "a+");
				$fic2 = fopen("./TitreEnCours.txt", "a+");		
				$retour = "accueil.php";
			break;
			
			case 2:
				$fic1 = fopen("./TacheAFaire.txt", "a+");
				$fic2 = fopen("./TitreAFaire.txt", "a+");
				$retour = "Tafaire.php";
			break;
			
			case 3:
				$fic1 = fopen("./TacheTermine.txt", "a+");
				$fic2 = fopen("./TitreTermine.txt", "a+");
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
			
			fclose($fic1);
			fclose($fic2);
			
			return $retour;
	}
	
		$retour = inserttask($titre, $datedeb, $datefin, $contenu, $typetache);
		
		echo $titre;
		echo $contenu;
		
		header("Location: http://fc.isima.fr/~rophelizon/devweb_projet/$retour");
		
?>
