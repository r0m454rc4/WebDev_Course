<!DOCTYPE html>
<html lang="ca">
	<head>
		<meta charset="utf-8">
		<title>Creació d'un fitxer</title>	
	</head>  
	<body>
	<?php
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			echo "<b>CREANT UN FITXER I ESCRIVINT DADES</b><br>";
			if ($name=$_POST["nom"]){				
				$filename="/var/www/html/fitxers/dades/".$name;
				if ($fitxer=fopen($filename,"w")){
					echo "El fitxer ".$name." s'ha creat correctament<br>";
					$texte="GLOUCESTER\n";
					if (fwrite($fitxer,$texte)){
						echo "S'ha afegit un primer text al fitxer $name<br>";
					}
					else{
						echo "No s'ha pogut afegir un primer text al fitxer $name<br>";
					}
					fclose($fitxer);
				}
				else {
					echo "El fitxer ".$name." no s'ha creat<br>";
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
	<a href="http://localhost:8080/crea_escriu.html">Torna a la pàgina anterior</a><br>
	<a href="http://localhost:8080/menu.html">Torna al menú</a>
	</body>
</html>
