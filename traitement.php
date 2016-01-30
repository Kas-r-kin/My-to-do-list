<!-- http://fc.isima.fr/~rophelizon -->

<!-- Implémenter des tests auto avec travis -->
<!-- Présentation : 1 partie dev, 1 partie outils-->

<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="traitement.css" />
	<body>
		<form method="post" action="index.html">
			
			<p class="Interface2">
				<input type="submit" value="Déconnexion" />
			</p>
			
  		<p>
		<?php
		
		include('methodes.php');
  		
  		$pseudo = $_POST['Username'];
  		$pass = sha1($_POST['Password']);
  		$new_pseudo = $_POST['NewUsername'];
  		$new_pass = $_POST['NewPassword'];
  		$new_pass_verif = $_POST['NewPasswordVerif'];

  		
  		
		
		/*
		function Register($Login, $Password, $Password_verif)
		{
			$validation = 0;
			$BDD = fopen("./BDD.txt", "rw");
			
			while(!feof($BDD))
			{
				$ligne = fgets($BDD);
				$ligne = substr($ligne, 0, strlen($ligne)-1);
				//Retire le caractère de contrôle \n
				list($user, $passwd, $uid) = split(":", $ligne, 3);
				if($Password == $Password_verif)
				{
					if ($user != $Login)
					{
						$validation = 1;
					}
					else
					{
						echo "Login déjà pris";
					}
				}
				else
				{
					echo "Mots de passe différents";
				}
			}
			if ($validation)
			{
				$array = array ("", $user, $Password, "2\n");
				$contenu = implode(":", $array);
				fputs($BDD, $contenu);
			}
			
			fclose($BDD);
			return $validation;
		}
		*/
				
		
		if (checkParam($pseudo) && checkParam($pass))
		{
			if (checkUser($pseudo, $pass))
			{
				$_SESSION['auth']=true;
				$_SESSION['login']=$pseudo;
				$_SESSION['lang'] = "fr";
				header('Location: http://fc.isima.fr/~rophelizon/devweb_projet/accueil.php');
				exit();
			}
			else
			{ 
				//echo 'Utilisateur inconnu';
				header('Location: http://fc.isima.fr/~rophelizon/devweb_projet/index.html');
				exit();
			}
		}
		else
		{
			//echo 'Login ou mot de passe incorrect';
			header('Location: http://fc.isima.fr/~rophelizon/devweb_projet/index.html');
			exit();
		}
 		
  		//Register($new_pseudo, $new_pass, $new_pass_verif);
  		
  		?>
  		</p> 		
  		</form>
	</body>
</html>
