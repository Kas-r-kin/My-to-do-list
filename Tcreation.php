<?php
	
	include('methodes.php');
	include('check_log.php');
	include('./lang/lang.php');

	echo "<!doctype html>";
	echo "<html>";
	echo "<head>";
	echo "<title>TON TITRE DE LA PAGE !!!!! BORDEL, SUR TON ONGLET !!!!</title>";
	echo "<meta charset=\"UTF-8\"/>";
	echo "</title>";
	echo "<body>";
		
	echo "<h1>$TXT_TCREATION</h1>";
		echo "<form method=\"post\" action=\"GestionTache.php?lang=$lang\">";

  		 echo "<p class=\"Interface\">";
				
				echo "<p>$TXT_TITRE</p>";
   			    echo "<label for=\"titre\"></label>";
    			echo "<input type=\"text\" name=\"titre\" id=\"titre\" placeholder= \"$TXT_TITRE\" /></br>";
    			
    			echo "<p>$TXT_TYPE</p>";
    			echo "<label for=\"typetache\"></label>";
   			    echo "<input type=\"typetache\" name=\"typetache\" id=\"typetache\" placeholder= \"En cours = 1 / A faire = 2\" /></br>";
 		      
				echo "<p>$TXT_DATE_DEB</p>";
    			echo "<label for=\"datedeb\"></label>";
   			    echo "<input type=\"datedeb\" name=\"datedeb\" id=\"datedeb\" placeholder= \"$TXT_DATE_DEB\" /></br>";
   			    
   			    echo "<p>$TXT_DATE_FIN</p>";
   			    echo "<label for=\"datefin\"></label>";
   			    echo "<input type=\"datefin\" name=\"datefin\" id=\"datefin\" placeholder= \"$TXT_DATE_FIN\" /></br>";
   			    
   			    echo "<p>$TXT_OBJ</p>";
   			    echo "<textarea name=\"contenu\" rows=\"30\" cols=\"100\"></textarea></br>";
   			    
				echo "<input type=\"submit\" value=\"$TXT_VALID\" />";
		echo "</p>";
		echo "</form>";
		
		echo "<form method=\"post\" action=\"accueil.php?lang=$lang\">";
			echo "<p class=\"Interface2\">";
				echo "<input type=\"submit\" value=\"$TXT_RETURN\" />";
			echo "</p>";
			
  		echo "<p>";
  		echo "</p>"; 		
  		echo "</form>";


	echo "</body>";
echo "</html>";

?>
