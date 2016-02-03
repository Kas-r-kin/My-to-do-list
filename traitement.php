		<?php
		
		include('methodes.php');
		
		start_session();

  		$pseudo = (isset($_POST['Username']) && !empty($_POST['Username'])) ? $_POST['Username'] : '';
  		$pass = (isset($_POST['Password']) && !empty($_POST['Password'])) ? $_POST['Password'] : '';
  		$new_pseudo = (isset($_POST['NewUsername']) && !empty($_POST['NewUsername'])) ? $_POST['NewUsername'] : '';
  		$new_pass = (isset($_POST['NewPassword']) && !empty($_POST['NewPassword'])) ? $_POST['NewPassword'] : '';
  		$new_pass_verif = (isset($_POST['NewPasswordVerif']) && !empty($_POST['NewPasswordVerif'])) ? $_POST['NewPasswordVerif'] : '';
  		
  		$remp = array('\\', ':', '#');
        $pseudo = str_replace($remp, "", $pseudo);
        $pass = str_replace($remp, "", $pass);
        $new_pseudo = str_replace($remp, "", $new_pseudo);
        $new_pass = str_replace($remp, "", $new_pass);
        $new_pass_verif = str_replace($remp, "", $new_pass_verif);
        
        $verif_pass = strlen($new_pass);
        
        if(isset($new_pass) && !empty($new_pass) && $verif_pass < 5)
        {
			header('Location: http://fc.isima.fr/~rophelizon/devweb_projet/index.php');
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
				$_SESSION['log']=1;
				setcookie("login", $new_pseudo, time() + 31536000);
				header('Location: http://fc.isima.fr/~rophelizon/devweb_projet/accueil.php');
			}
			else
			{
				//failed sign in
				header('Location: http://fc.isima.fr/~rophelizon/devweb_projet/index.php');
			}
		}
		
		//login_test
		if (checkParam($pseudo) && checkParam($pass))
		{
			if (checkUser($pseudo, $pass))
			{
				//known user
				$_SESSION['log']=1;
				setcookie("login", $pseudo, time() + 31536000);
				header('Location: http://fc.isima.fr/~rophelizon/devweb_projet/accueil.php');
				exit();
			}
			else
			{ 
				//unknown user
				header('Location: http://fc.isima.fr/~rophelizon/devweb_projet/index.php');
				exit();
			}
		}

  		?>
