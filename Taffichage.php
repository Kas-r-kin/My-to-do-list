<?php
	
	include('methodes.php');
	include('check_log.php');
	include('./lang/lang.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>TON TITRE DE LA PAGE !!!!! BORDEL, SUR TON ONGLET !!!!</title>
<meta charset="UTF-8"/>
</title>
	<link rel="stylesheet" href="traitement.css" />
	<body>
		

<?php
	


		$nom_tache = $_GET['Tache'];
		$type = $_GET['type'];
		

	
		$retour = readtask($nom_tache, $type, $lang, $TXT_TASK, $TXT_DATE_DEB, $TXT_DATE_FIN, $TXT_CONT);	
		
		echo "<form method=\"post\" action=\"$retour\">";
			echo "<p class=\"Interface2\">";
				echo "<input type=\"submit\" value=\"$TXT_RETURN\" />";
			echo "</p>";
			
  		echo "<p>";
  		
  		echo "</p>"; 		
  		echo "</form>";
  		
  		
  		
  		echo "<form method=\"post\" action=\"ModifTache.php?Tache=$nom_tache&amp;type=$type&amp;lang=$lang\">";
			echo "<p class=\"Interface2\">";
				echo "<input type=\"submit\" value=\"$TXT_MOD\" />";
			echo "</p>";
			
  		echo "<p>";
		
		echo "</p>";
  		echo "</form>";
  		
  		
  		//Admin rights required to delete the tasks
  		if (isset($_SESSION['level']) && $_SESSION['level'] == 1)
  		{
  		
  		echo "<form method=\"post\" action=\"SuppressionTache.php?Tache=$nom_tache&amp;type=$type&amp;lang=$lang\">";
			echo "<p class=\"Interface2\">";
				echo "<input type=\"submit\" value=\"$TXT_SUPP\" />";
			echo "</p>";
			
  		echo "<p>";
		
		echo "</p>";
  		echo "</form>";
		}
?>


	</body>
</html>
