<!-- http://fc.isima.fr/~rophelizon -->

<!-- Implémenter des tests auto avec travis -->

<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="traitement.css" />
	<body>
		<form method="post" action="index.html">
			
			<p class="Interface2">
				<input type="submit" value="Déconnexion" />
			</p>
			
  		<p><?php
  		
  		$pseudo = $_POST['Username'];
  		$pass = $_POST['Password'];
  		/*$new_pseudo = $_POST['NewUsername'];
  		$new_pseudo_verif = $_POST['NewUsenameVerif'];
  		$new_pass = $_POST['NewPassword'];*/
  		
  		function checkParam($param)
		{
			return isset($param) && !empty($param);
		}
		
		
		function checkUser($param)
		{
			$validation = 0;
			$BDD = fopen("./BDD.txt", "r");
			
			
			while(!feof($BDD))
			{
				$ligne = fgets($BDD);
				$ligne = substr($ligne, 0, strlen($ligne)-1);
				//Retire le caractère de contrôle \n
				if($ligne == $param)
				{
					$validation = 1;
				}
			}
			fclose($BDD);
			return $validation;
		}
		
		
		if (checkParam($pseudo) && checkParam($pass))
		{
			if (checkUser($pseudo) && checkUser($pass))
			{
				echo "Bonjour";
				$_SESSION['auth']=true;
				$_SESSION['login']=$pseudo;
			}
			else{ echo 'Utilisateur inconnu';}
		}
		else{ echo 'il manque quelque chose!';}
  		
  		?></p>

  		<!--<p> <a href="index.php"> <input type="submit" value="Déconnexion" /></a> </p>-->
  		
  		</form>
	</body>
</html>