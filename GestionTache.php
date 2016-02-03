<?php
	
	include('methodes.php');
	include('check_log.php');
	include('./lang/lang.php');

	$titre = $_POST['titre'];
	$typetache = $_POST['typetache'];
	$datedeb = $_POST['datedeb'];
	$datefin = $_POST['datefin'];
	$contenu = $_POST['contenu'];
		

	
	$retour = inserttask($titre, $datedeb, $datefin, $contenu, $typetache);
		
	header("Location: http://fc.isima.fr/~rophelizon/devweb_projet/$retour?lang=$lang");
	exit();
		
?>

