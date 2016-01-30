<html>
	<body>

	<?php	
	
	include('lang.php');
	include('methodes.php');
	
	
	$nom_tache = $_GET['Tache'];
	$type = $_GET['type'];
	
	$retour = deletetask($nom_tache, $type);
	
	header("Location: http://fc.isima.fr/~rophelizon/devweb_projet/$retour?lang=$lang");
	
	?>

	</body>
</html>
