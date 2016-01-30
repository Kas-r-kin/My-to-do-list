<html>
	<body>

	<?php
	
	include('./lang/lang.php');
	include('methodes.php');
	
	$nom_tache = $_GET['Tache'];
	$type = $_GET['type'];
	

	changetask($nom_tache, $type, $lang, $TXT_MOD, $TXT_TYPE, $TXT_DATE_DEB, $TXT_DATE_FIN, $TXT_OBJ, $TXT_VALID);
	
	?>

	</body>
</html>
