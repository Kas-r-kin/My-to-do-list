<!DOCTYPE html>

<?php

	if ($_GET['lang'] =="fr")	// si la langue est 'fr' (français) on inclut le fichier fr-lang.php
	{           
		include('lang/fr-lang.php');
	}
	else 
	{
		if ($_GET['lang'] =='en')
		{
			include('lang/en-lang.php');
		}
		else
		{
			include('lang/fr-lang.php');
		}
	}

echo "<html>";
echo "<head>";

    echo "<meta charset=\"utf-8\">";
    echo "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">";
    echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";
    echo "<meta name=\"description\" content=\"\">";
    echo "<meta name=\"author\" content=\"\">";

    echo "<title>My ZZtasks Home</title>";

    echo "<!-- Bootstrap Core CSS -->";
    echo "<link href=\"css/bootstrap.min.css\" rel=\"stylesheet\">";

    echo "<!-- Custom CSS -->";
    echo "<link href=\"css/4-col-portfolio.css\" rel=\"stylesheet\">";

    echo "<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->";
    echo "<!-- WARNING: Respond.js doesnt work if you view the page via file: -->";
    echo "<!--[if lt IE 9]>";
        echo "<script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>";
        echo "<script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>";
    echo "<![endif]-->";

echo "</head>";

echo "<body>";

    echo "<!-- Navigation -->";
    echo "<nav class=\"navbar navbar-inverse navbar-fixed-top\" role=\"navigation\">";
        echo "<div class=\"container\">";
            echo "<!-- Brand and toggle get grouped for better mobile display -->";
            echo "<div class=\"navbar-header\">";
                echo "<button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\">";
                    echo "<span class=\"sr-only\">Toggle navigation</span>";
                    echo "<span class=\"icon-bar\"></span>";
                    echo "<span class=\"icon-bar\"></span>";
                    echo "<span class=\"icon-bar\"></span>";
                    echo "<span class=\"icon-bar\"></span>";
                echo "</button>";
					echo "<li>";
                        echo "<a href=\"./accueil.php?lang=fr\">Français</a>";
                        echo "<a href=\"./accueil.php?lang=en\">English</a>";
                    echo "</li>";
                echo "<a class=\"navbar-brand\" href=\"./index.html\">$TXT_DECONNEXION</a>";
            echo "</div>";
            echo "<!-- Collect the nav links, forms, and other content for toggling -->";     
            echo "<div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">";
                echo "<ul class=\"nav navbar-nav\">";
                    echo "<li>";
                        echo "<a href=\"./accueil.php\">$TXT_ENCOURS</a>";
                    echo "</li>";
                    echo "<li>";
                        echo "<a href=\"./Tafaire.php\">$TXT_AFAIRE</a>";
                    echo "</li>";
                    echo "<li>";
                        echo "<a href=\"./Ttermine.php\">$TXT_TERMINE</a>";
                    echo "</li>";
                    echo "<li>";
                        echo "<a href=\"./Tcreation.php\">$TXT_CREATION</a>";
                    echo "</li>";
                echo "</ul>";
            echo "</div>";
            echo "<!-- /.navbar-collapse -->";
        echo "</div>";
        echo "<!-- /.container -->";
    echo "</nav>";

    echo "<!-- Page Content -->";
    
    echo "<div class=\"container\">";

        echo "<!-- Page Heading -->";
        echo "<div class=\"row\">";
            echo "<div class=\"col-lg-12\">";
                echo "<h1 class=\"page-header\">$TXT_ENCOURS";
                    echo "<small></small>";
                echo "</h1>";
            echo "</div>";
        echo "</div>";
        echo "<!-- /.row -->";


		
		$Type = 1;
        echo "<!-- Projects Row -->";
		$fichier = fopen("./Taches/TitreEnCours.txt", "r");
		$nom = fgets($fichier);
		$nom = substr($nom, 0, strlen($nom)-1);
		
		
		while(!feof($fichier))
		{
       echo "<div class=\"row\">";
            echo "<div class=\"col-md-3 portfolio-item\">";
            echo "<p>Tâche $nom</p>";
                echo "<a href=\"Taffichage.php?Tache=$nom&amp;type=$Type\">";
                    echo "<img class=\"img-responsive\" src=\"./minichacal.jpg\" alt=\"chacal1 !\">";
                echo "</a>";
            echo "</div>";
        echo "</div>";
        echo "<!-- /.row -->";
        $nom = fgets($fichier);
		$nom = substr($nom, 0, strlen($nom)-1);
		}
		fclose($fichier);
?>
        <hr>

        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->
    

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
