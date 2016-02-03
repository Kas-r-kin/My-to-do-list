<?php

	include('check_log.php');
	
	$_SESSION['level'] = NULL;
	$_SESSION['log'] = NULL;

	session_destroy();

	header('Location: http://fc.isima.fr/~rophelizon/devweb_projet/index.php');
?>
