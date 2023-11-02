<!DOCTYPE html>
<html lang="ca">
	<head>
		<meta charset="utf-8">
		<title>Esborrant un fitxer</title>	
	</head>  
	<body>
	<?php
		if (($_SERVER['REQUEST_METHOD'] == "POST") && ($_POST['metode']=="DELETE")) {
			echo "<b>ESBORRANT UN FITXER</b><br>";
			if ($name=$_POST["nom"]){				
				$filename="/var/www/html/fitxers/dades/".$name;
				if (file_exists($filename)){
					if(unlink($filename)){
						echo "El fitxer $filename ha estat esborrat<br>";
					}
					else {
						echo "El fitxer $filename no s'ha pogut esborrar<br>";
					}
				}
				else {
					echo "El fitxer ".$name." no existeix<br>";
				}
			}
			else {
				echo "No s'ha enviat el nom del fitxer que s'ha d'esborrar<br>";
			}
		}
		else {
			echo "Mètode incorrecte<br>";
		}	
	?>
	<a href="http://localhost:8080/esborra.html">Torna a la pàgina anterior</a><br>
	<a href="http://localhost:8080/menu.html">Torna al menú</a>
	</body>
</html>
