<?php

	if(!isset($_GET['lang']) || !in_array($_GET['lang'], array('fr', 'en'))) $_GET['lang'] = 'fr';

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
