<?php
	
	include('methodes.php');
	include('check_log.php');
	include('./lang/lang.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>TON TITRE DE LA PAGE !!!!! BORDEL, SUR TON ONGLET !!!!</title>
<meta charset="UTF-8"/>
</title>

	<?php
	
	$nom_tache = $_GET['Tache'];
	$type = $_GET['type'];
	

	changetask($nom_tache, $type, $lang, $TXT_MOD, $TXT_TYPE, $TXT_DATE_DEB, $TXT_DATE_FIN, $TXT_OBJ, $TXT_VALID, $TXT_RETURN);
	
	?>

	</body>
</html>
