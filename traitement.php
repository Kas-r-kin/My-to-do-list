<!-- http://fc.isima.fr/~rophelizon-->

<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="traitement.css" />
	<body>
		<form method="post" action="index.php">
			
			<p class="Interface2">
				<input type="submit" value="Déconnexion" />
			</p>
			
  		<p><?php echo $_POST['pseudo'];
  		echo $_POST['pass'];
  		
  		$pseudo = $_POST['pseudo'];
  		$pass = $_POST['pass'];
  		
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
				echo $ligne;
				echo "espace";
				echo $param;
				/*fgets prends le enter ?*/
				if($ligne == $param)
				{
					echo "fais chier";
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
				session_start();
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
