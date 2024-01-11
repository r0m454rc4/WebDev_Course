<?php
	#
	echo "<h2>Lectura de BD - MySQLi - Estil POO - Tractament d'errors amb els mètodes de la classe</h2>";
	#
	#
	# DADES CONNEXIÓ A BD
	#
	$dbhost="localhost";
	$dbusername="adcli";
	$dbuserpassword="FjeClot23@";
	$baseDades="bdcli"; 
	#
	#
	# DADES TAULA
	#
	$taula="tlcli";
	#
	$bd = new mysqli($dbhost,$dbusername,$dbuserpassword,$baseDades);
	if ($mysqli->connect_errno){
		printf("Problema de connexió a la BD: %s\n", $mysqli->connect_error);
		exit();
	}
	else {
		echo "<b>Connexió a la BD  $baseDades realitzada amb èxit</b><br><br>";
	}
	$peticio = "UPDATE $taula SET cognoms='pons pérez' WHERE codi=1";
	$bd->query($peticio) or die('Consulta fallida: ' . $bd->errno . $bd->error);
	$consulta = "SELECT * FROM $taula";
	$resultat = $bd->query($consulta) or die("Consulta fallida - Codi: ".$bd->errno." -- Missatge d'error: ".$bd->error);
	echo "<b><u>Entrades de la base de dades: </u></b><br><br>";
	echo "<table style='border:1px solid black; border-collapse:collapse;'>\n";
	echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Codi</b></td>\n";
	echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Nom</b></td>\n";
	echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Cognom</b></td>\n";
	echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>email</b></td>\n";
	echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Contrasenya</b></td>\n";
	while ($fila = $resultat->fetch_assoc()) {
		echo "\t<tr>\n";
		foreach ($fila as $valor_columna) {
			echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'> $valor_columna </td>\n";
		}
		echo "\t</tr>\n";		
	}
	echo "</table>\n";	
	$mysqli->close();
?>

