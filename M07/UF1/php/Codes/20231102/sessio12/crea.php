<!DOCTYPE html>
<html lang="ca">
	<head>
		<meta charset="utf-8">
		<title>Creació d'un fitxer</title>	
	</head>  
	<body>
	<?php
		echo "<b>CREANT UN FITXER</b><br>";
		$name=$_POST["nom"];
		$filename="/var/www/html/fitxers/dades/".$name;
		$fitxer=fopen($filename,"w") or die ("No s'ha pogut crear el fitxer");
		fclose($fitxer);		
	?>
	<a href="http://localhost:8080/crea.html">Torna a la pàgina anterior</a><br>
	<a href="http://localhost:8080/menu.html">Torna al menú</a>
	</body>
</html>
