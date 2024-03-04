<?php
#
echo "<h2>Lectura de BD - MySQLi - Estil POO - Tractament d'errors amb els mètodes de la classe</h2>";
#
$dbhost = "localhost";
$dbusername = "adcli";
$dbuserpassword = "FjeClot23@";
$baseDades = "bdcli";
$taula = "tlcmd";
$mysqli = new mysqli($dbhost, $dbusername, $dbuserpassword, $baseDades);

// Check connection.
if ($mysqli->connect_errno) {
	printf("Problema de connexió a la BD: %s\n", $mysqli->connect_error);
	exit();
} else {
	echo "<b>Connexió a la BD  $baseDades realitzada amb èxit</b><br><br>";
}

$consulta = "SELECT * FROM $taula";

// query($consulta) is to query the specified consult.
$resultat = $mysqli->query($consulta) or die("Consulta fallida - Codi: " . $mysqli->errno . " -- Missatge d'error: " . $mysqli->error);
echo "<b><u>Entrades de la base de dades <i>$baseDades</i>: </u></b><br><br>";
echo "<table style='border:1px solid black; border-collapse:collapse;'>\n";
echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>ID Comanda</b></td>\n";
echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Estat comanda</b></td>\n";
echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Valor comanda</b></td>\n";
echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Codi client</b></td>\n";

// fetch_assoc is to fetch results until the last row. 
while ($fila = $resultat->fetch_assoc()) {
	echo "\t<tr>\n";
	foreach ($fila as $valor_columna) {
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'> $valor_columna </td>\n";
	}
	echo "\t</tr>\n";
}

echo "</table>\n";
echo "<br><b>Total registres:</b> " . $resultat->num_rows . "<br><br>";

// Delete the register that has its code is 2.
$codi=2; 
$connbd = new mysqli($dbhost,$dbusername,$dbuserpassword,$baseDades);
if ($connbd->connect_errno){
	printf("Problema de connexió a la BD: %s\n", $mysqli->connect_error);
	exit();
}	
else echo "Connexió a la BD  $baseDades realitzada amb èxit</b><br><br>";

// ESBORRANT EL REGISTRE
echo "<u>2- Esborrant el registre amb el codi client: $codi </u><br><br>";

//Fase de Preparació.
$sql="DELETE FROM tlcli WHERE codi = ?"; // Sentència SQL Parametritzada
$sentencia = $connbd -> prepare($sql); //Prepara
if (!$sentencia){
	echo "Esborrament d'un registre - Error en la fase de preparació: (" . $connbd->errno . ") " . $connbd->error;
	$connbd->close();
	exit();
} 

//Fase de Vinculació
if (!$sentencia->bind_param("s", $codi)) { //Vinculació i tractament d'error durant la vinculació 
	echo "Esborrament d'un registre - Error en la fase de vinculació: (" . $sentencia->errno . ") " . $sentencia->error;
	$connbd->close();
	exit();
}
else echo "Esborrament d'un registre: Fase de vinculació realitzada amb èxit<br><br>";

//Fase d'Execució
if (!$sentencia->execute()) { // Execució i tractament d'error durant l'execució
	echo "Esborrament d'un registre - Error en la fase d'execució: (" . $sentencia->errno . ") " . $sentencia->error;
	$connbd->close();
	exit();
}
else echo "Esborrament d'un registre: Execució realitzada amb èxit<br><br>";

// Show the table again.
$resultat = $mysqli->query($consulta) or die("Consulta fallida - Codi: " . $mysqli->errno . " -- Missatge d'error: " . $mysqli->error);
echo "<b><u>Entrades de la base de dades <i>$baseDades</i>: </u></b><br><br>";
echo "<table style='border:1px solid black; border-collapse:collapse;'>\n";
echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>ID Comanda</b></td>\n";
echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Estat comanda</b></td>\n";
echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Valor comanda</b></td>\n";
echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Codi client</b></td>\n";

// fetch_assoc is to fetch results until the last row. 
while ($fila = $resultat->fetch_assoc()) {
	echo "\t<tr>\n";
	foreach ($fila as $valor_columna) {
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'> $valor_columna </td>\n";
	}
	echo "\t</tr>\n";
}

echo "</table>\n";
echo "<br><b>Total registres:</b> " . $resultat->num_rows;

$mysqli->close();