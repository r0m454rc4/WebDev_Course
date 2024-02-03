<?php
	#
	echo "<b><u>PROCEDIMENTS EMMAGATZEMATS A LA BASE DE DADES - MySQLi</u></b><br><br>";
	#
	# Dades de la connexió
	#
	$dbhost="localhost";
	$dbusername="adcli";
	$dbuserpassword="FjeClot23@";
	$baseDades="bdcli"; 
	#
	# Connexió a la base de dades
	$mysqli = new mysqli($dbhost,$dbusername,$dbuserpassword,$baseDades);

	# Emmagatzemant un procediment en la base de dades.
	# Es pot veure el procediment executant dins del servidor--> SHOW PROCEDURE STATUS WHERE DB='bdcli';
	$mysqli->query("DROP PROCEDURE IF EXISTS mostra_registre"); // Esborra el procediment si ja exisitia
	// mostra_registre(IN id int) is to be ablo to specify the "id" as an int.
	$mysqli->query("CREATE PROCEDURE mostra_registre(IN id int)
						BEGIN
							select * from tlcli where codi=id;
						END;"
					);// Creació i emmagatzematge del procediment. Recorda que tlcli és una taula de bdcli
	#
	# Crida al procediment emmagatzemat
	$consulta = 'CALL mostra_registre(3)';
	$resultat=$mysqli->query($consulta);
	#
	# Mostrant el resultats retornats per la base de dades
	echo "<b><u>Registres trobats: </u></b><br><br>";
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
	#
	# Tancament de la connexió
	$mysqli->close();
?>
