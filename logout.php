<?php
	$_SESSION['login'] = NULL;
	$_SESSION['level'] = NULL;
	$_SESSION['auth']=NULL;

	session_destroy();

	header('Location: http://fc.isima.fr/~rophelizon/devweb_projet/index.html');
?>
