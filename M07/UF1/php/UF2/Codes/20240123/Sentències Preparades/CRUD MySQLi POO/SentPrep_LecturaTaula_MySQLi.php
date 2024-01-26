<?php
	$dbhost="localhost";
	$dbusername="adcli";
	$dbuserpassword="FjeClot23@";
	$baseDades="bdcli";
	$taula="tlcli";
	#Connexió a la base de dades. No es fa tractament d'errors.
	$connbd = new mysqli($dbhost,$dbusername,$dbuserpassword,$baseDades);
	//Consulta a la base de dades amb sentències preparades. No es fa tractament d'errors.
	$sentencia = $connbd -> prepare("select * from $taula"); //Prepara
	$sentencia->execute(); //Executa
	$resultat=$sentencia->get_result(); //Desa el resultat dins d'una variable
	//Mostra resultats
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
	//Tancament connexió
	$connbd->close();	
?>
