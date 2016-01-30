<?php

	if ($_GET['lang'] == 'fr')	// si la langue est 'fr' (français) on inclut le fichier fr-lang.php
	{   
		$lang = 'fr';
		include('lang/fr-lang.php');
	}
	else 
	{
		if ($_GET['lang'] == 'en')
		{
			$lang = 'en';
			include('lang/en-lang.php');
		}
		else
		{
			$lang = 'fr';
			include('lang/fr-lang.php');
		}
	}

?>
