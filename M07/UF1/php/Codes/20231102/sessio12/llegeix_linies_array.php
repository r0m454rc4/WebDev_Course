<!DOCTYPE html>
<html lang="ca">
	<head>
		<meta charset="utf-8">
		<title>Llegeix un fitxer</title>	
	</head>  
	<body>
	<?php
		if ($_SERVER['REQUEST_METHOD'] == "GET") {
			echo "<p><b>LLEGINT UN BLOC DE DADES D'UN FITXER QUE ES DESA DINS D'UN ARRAY DE STRINGS</b></p>";
			if ($name=$_GET["nom"]){				
				$filename="/var/www/html/fitxers/dades/".$name;
				if ($fitxer=fopen($filename,"r")) {
					$mida_fitxer=filesize($filename);
					$linies = explode(PHP_EOL, fread($fitxer,$mida_fitxer));
					// explode() separa un string en un array de strings a partir d'un caracter separador
					// PHP_EOL per defecte és igual a "\n".
					// Aquesta ordre separa el string que s'ha creat llegint el fitxer en un array de strings
					// utilitzant "\n" com a caràcter separador. Per tant, en aquest cas es separa el contingut per línies.
					// i cada línia es troba a una posició de l'array
					foreach ($linies as $linea) {
						echo "$linea</br>";						
					}
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
	<a href="http://localhost:8080/llegeix_linies_array.html">Torna a la pàgina anterior</a><br>
	<a href="http://localhost:8080/menu.html">Torna al menú</a>
	</body>
</html>
