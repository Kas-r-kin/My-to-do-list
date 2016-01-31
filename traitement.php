<!-- http://fc.isima.fr/~rophelizon -->

<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="traitement.css" />
	<body>
		<form method="post" action="index.html">
			
			<p class="Interface2">
				<input type="submit" value="Cancel" />
			</p>
			
  		<p>
		<?php
		
		include('methodes.php');
  		
  		/*$pseudo = $_POST['Username'];
  		$pass = sha1($_POST['Password']);
  		$new_pseudo = $_POST['NewUsername'];
  		$new_pass = sha1($_POST['NewPassword']);
  		$new_pass_verif = sha1($_POST['NewPasswordVerif']);*/

		
  		$pseudo = $_POST['Username'];
  		$pass = $_POST['Password'];
  		$new_pseudo = $_POST['NewUsername'];
  		$new_pass = $_POST['NewPassword'];
  		$new_pass_verif = $_POST['NewPasswordVerif'];
  		
  		$remp = array('\\', ':', '#');
        $pseudo = str_replace($remp, "", $pseudo);
        $pass = str_replace($remp, "", $pass);
        $new_pseudo = str_replace($remp, "", $new_pseudo);
        $new_pass = str_replace($remp, "", $new_pass);
        $new_pass_verif = str_replace($remp, "", $new_pass_verif);
        
        $verif_pass = strlen($new_pass);
        
        if(isset($new_pass) && !empty($new_pass) && $verif_pass < 6)
        {
			header('Location: http://fc.isima.fr/~rophelizon/devweb_projet/index.html');
			exit();
		}
        
        $pseudo = substr($pseudo, 0, 20);
        $pass = substr($pass, 0, 20);
        $new_pseudo = substr($new_pseudo, 0, 20);
        $new_pass = substr($new_pass, 0, 20);
        $new_pass_verif = substr($new_pass_verif, 0, 20);
        

        
        $pass = sha1($pass);
        $new_pass = sha1($new_pass);
        $new_pass_verif = sha1($new_pass_verif);
		
		
		//Sign in_test
		if(checkParam($new_pseudo) && checkParam($new_pass) && checkParam($new_pass_verif))
		{
			if(Register($new_pseudo, $new_pass, $new_pass_verif))
			{
				//successful sign in
				header('Location: http://fc.isima.fr/~rophelizon/devweb_projet/accueil.php');
			}
			else
			{
				//failed sign in
				header('Location: http://fc.isima.fr/~rophelizon/devweb_projet/index.html');
			}
		}
		
		//login_test
		if (checkParam($pseudo) && checkParam($pass))
		{
			if (checkUser($pseudo, $pass))
			{
				//known user
				$_SESSION['auth']=true;
				$_SESSION['login']=$pseudo;
				header('Location: http://fc.isima.fr/~rophelizon/devweb_projet/accueil.php');
				exit();
			}
			else
			{ 
				//unknown user
				header('Location: http://fc.isima.fr/~rophelizon/devweb_projet/index.html');
				exit();
			}
		}

  		?>
  		</p> 		
  		</form>
	</body>
</html>
