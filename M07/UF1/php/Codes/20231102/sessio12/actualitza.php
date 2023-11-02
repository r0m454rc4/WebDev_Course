<!DOCTYPE html>
<html lang="ca">
	<head>
		<meta charset="utf-8">
		<title>Actualització d'un fitxer</title>	
	</head>  
	<body>
	<?php
		if (($_SERVER['REQUEST_METHOD'] == "POST") && ($_POST['metode']=="PUT")) {
			echo "<b>ACTUALITZANT UN FITXER: AFEGINT DADES</b><br>";
			if ($name=$_POST["nom"]){				
				$filename="/var/www/html/fitxers/dades/".$name;
				if ($fitxer=fopen($filename,"a")){
					echo "El fitxer ".$name." s'ha obert per actualitzar correctament<br>";
					$texte="Now is the winter of our discontent\nmade glorious summer by this sun of York;\n";
					if (fwrite($fitxer,$texte)){
						echo "S'ha afegit text al fitxer $name<br>";
					}
					else{
						echo "No s'ha pogut afegir text al fitxer $name<br>";
					}
					fclose($fitxer);
				}
				else {
					echo "El fitxer ".$name." no s'ha obert<br>";
				}
			}
			else {
				echo "No s'ha enviat el nom del fitxer que s'ha de crear<br>";
			}
		}
		else {
			echo "Mètode incorrecte<br>";
		}	
	?>
	<a href="http://localhost:8080/actualitza.html">Torna a la pàgina anterior</a><br>
	<a href="http://localhost:8080/menu.html">Torna al menú</a>
	</body>
</html>
