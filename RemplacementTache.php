<?php

	include('./lang/lang.php');
	include('methodes.php');

	$typeapres = $_POST['typetache'];
	$Ndatedeb = $_POST['datedeb'];
	$Ndatefin = $_POST['datefin'];
	$Ncontenu = $_POST['Ncontenu'];
	
	$typeavant = $_GET['Type'];
	$titre = $_GET['titre'];
	$Adatedeb = $_GET['Adatedeb'];
	$Adatefin = $_GET['Adatefin'];
	$Acontenu = $_GET['Acontenu'];
		
	
	$retour = replacetask($typeavant, $typeapres, $titre, $Ndatedeb, $Ndatefin, $Ncontenu, $Adatedeb, $Adatefin, $Acontenu);
	
	
	header("Location: http://fc.isima.fr/~rophelizon/devweb_projet/$retour?lang=$lang");
		
		
?>
