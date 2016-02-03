<?php

/*start_session();*/
	if($_SESSION['log'] == NULL)
	{
		header('Location: http://fc.isima.fr/~rophelizon/devweb_projet/index.php');
		exit();
	}

?>
