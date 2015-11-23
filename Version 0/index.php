<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="page.css" />
		<title>Hello</title>
	</head>
	<body>
		<h1>My to do list</h1>
		<form method="post" action="traitement.php">

  		 <p class="Interface">

   			    <label for="pseudo"></label>

    			   <input type="text" name="pseudo" id="pseudo" placeholder= "Pseudo" />
 		      
    			   <label for="pass"></label>

   			    <input type="password" name="pass" id="pass" placeholder= "Mot de passe" />
				<input type="submit" value="Valider" />
		</p>

		</form>
		<?php
			function checkParam($param)
			{
				return isset($param) && !empty($param);
			}
		
		?>
	</body>
</html>
