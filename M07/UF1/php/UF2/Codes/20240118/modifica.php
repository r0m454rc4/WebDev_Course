<?php
#
echo "<h2>Lectura de BD - PDO - Errors amb try-catch</h2>";
#
# DADES CONNEXIÓ A BD
#
$dbhost = "localhost";
$dbusername = "rosaca";
$dbuserpassword = "FjeClot23@";
$baseDades = "rosaca23";
#
#
# DADES TAULA
#
$taula = "rosaca2023";
#
try {
	$bd = new PDO("mysql:host=$dbhost;dbname=$baseDades", $dbusername, $dbuserpassword);
	$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); # Mode de gestió d'errors de PDO tipus exception
	$peticio = "UPDATE $taula SET email='joan@fje.edu' WHERE nom='joan'";
	$bd->exec($peticio); # exec() s'utilitza quan no hi ha un retorn de dades 
	$consulta = "SELECT * FROM $taula";

	// query($consulta) is to query the specified consult.
	$resultat = $bd->query($consulta); # exec() s'utilitza quan hi ha un retorn de dades 
	echo "<b><u>Entrades de la base de dades <i>$baseDades</i>: </u></b><br><br>";
	echo "<table style='border:1px solid black; border-collapse:collapse;'>\n";
	echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Codi</b></td>\n";
	echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Nom</b></td>\n";
	echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Cognom</b></td>\n";
	echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>email</b></td>\n";
	echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Contrasenya</b></td>\n";

	while ($fila = $resultat->fetch(PDO::FETCH_ASSOC)) {
		echo "\t<tr>\n";
		foreach ($fila as $valor_columna) {
			echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'> $valor_columna </td>\n";
		}
		echo "\t</tr>\n";
	}

	echo "</table>\n";
	$pdo = null; //Tancant connexió
} catch (PDOException $e) {
	print "Error!!! " . $e->getMessage() . "<br>";
	die();
}
