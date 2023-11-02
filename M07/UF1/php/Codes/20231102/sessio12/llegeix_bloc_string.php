<!DOCTYPE html>
<html lang="ca">
	<head>
		<meta charset="utf-8">
		<title>Llegeix un fitxer</title>	
	</head>  
	<body>
	<?php
		if ($_SERVER['REQUEST_METHOD'] == "GET") {
			echo "<p><b>LLEGINT UN BLOC DE DADES D'UN FITXER QUE ES DESA DINS D'UN STRING</b></p>";
			if ($name=$_GET["nom"]){				
				$filename="/var/www/html/fitxers/dades/".$name;
				if ($fitxer=fopen($filename,"r")) {
					$mida_fitxer=filesize($filename);
					$texte_llegit=fread($fitxer,$mida_fitxer);
					// Llegeix $mida_fitxer bytes del fitxer $filename i els desa dins de $texte 
					echo "<p>$texte_llegit</p>";
					fclose($fitxer);
				}
				else {
					echo "El fitxer ".$name." no s'ha pogut obrir per ser llegit<br>";
				}
			}
			else {
				echo "No s'ha enviat el nom del fitxer que s'ha de llegir<br>";
			}
		}
		else {
			echo "Mètode incorrecte<br>";
		}	
	?>
	<a href="http://localhost8080/llegeix_bloc_string.html">Torna a la pàgina anterior</a><br>
	<a href="http://localhost8080/menu.html">Torna al menú</a>
	</body>
</html>
