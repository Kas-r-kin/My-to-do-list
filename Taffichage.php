<html>
	<link rel="stylesheet" href="traitement.css" />
	<body>
		

<?php
	
	include('./lang/lang.php');
	include('methodes.php');
	


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
  		if ($_SESSION['level'] == 1)
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
