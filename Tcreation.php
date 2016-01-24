<html>
	<body>
		
<h1>Création de tâche</h1>
		<form method="post" action="GestionTache.php">

  		 <p class="Interface">
				
				<p>Titre</p>
   			    <label for="titre"></label>
    			<input type="text" name="titre" id="titre" placeholder= "Titre" /></br>
    			
    			<p>Type de tâche</p>
    			<label for="typetache"></label>
   			    <input type="typetache" name="typetache" id="typetache" placeholder= "En cours = 1 / A faire = 2" /></br>
 		      
				<p>Date de début</p>
    			<label for="datedeb"></label>
   			    <input type="datedeb" name="datedeb" id="datedeb" placeholder= "Date de début" /></br>
   			    
   			    <p>Date de fin</p>
   			    <label for="datefin"></label>
   			    <input type="datefin" name="datefin" id="datefin" placeholder= "Date de fin" /></br>
   			    
   			    <p>Objectifs</p>
   			    <textarea name="contenu" rows="30" cols="100"></textarea></br>
   			    
				<input type="submit" value="Valider" />
		</p>
		</form>


	</body>
</html>
