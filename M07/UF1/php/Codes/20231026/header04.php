<?php
	if ((isset($_GET['nom_fitxer'])) && ($_GET['nom_fitxer']!="")){
		$nomFitxer="/var/www/html/headers/".$_GET['nom_fitxer'];
		if (file_exists($nomFitxer)){
			header("HTTP/1.1 200 OK");
			// Indica el tipus de fitxer de manera que el navegador ho mostri correctament
			// Comprova que passa si comentes el header
			header('Content-Type: application/pdf');
			readfile($nomFitxer); //Llegeix el contingut del fitxer i ho envia
		}
		else{
			header("HTTP/1.1 404 Not Found");
			echo "Error 404: Fitxer no trobat<br>";
		}
	}
