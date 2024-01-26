<?php
	echo "<b><u>MODIFICACIÓ D'UN REGISTRE UTILITZANT MySQLi POO</u></b><br><br>";
	// DADE DE LA CONNEXIÓ
	$dbhost="localhost";
	$dbusername="adcli";
	$dbuserpassword="FjeClot23@";
	$baseDades="bdcli";
	$taula="tlcli";
	//
	// DADES PER REALITZAR LA MODIFICACIÓ
	$codi=5; // Codi del registre a modificar
	$nou_nom="Maria"; // Nou nom
	$nou_email="40615.clot@fje.edu"; // Nou email
	//
	//CONNEXIÓ A LA BASE DE DADES
	echo "<u>1- Connexió a la base de dades $bdcli</u><br><br>"; 
	$connbd = new mysqli($dbhost,$dbusername,$dbuserpassword,$baseDades);
	if ($connbd->connect_errno){
		printf("Problema de connexió a la BD: %s\n", $mysqli->connect_error);
		exit();
	}	
	else echo "Connexió a la BD  $baseDades realitzada amb èxit</b><br><br>";
	//
	// ACTUALITZANT EL REGISTRE
	echo "<u>2- Modificant el registre amb el codi $codi amb el nou nom $nou_nom i el nou email email $nou_email</u><br><br>";
	//Fase de Preparació.
	$sql="UPDATE $taula SET nom=?, email=? WHERE codi = ?"; // Sentència SQL Parametritzada
	$sentencia = $connbd -> prepare($sql); //Prepara
	if (!$sentencia){
		echo "Actualització d'un registre - Error en la fase de preparació: (" . $connbd->errno . ") " . $connbd->error;
		$connbd->close();
		exit();
	} 
	else echo "Actualització d'un registre: Fase de preparació finalitzada amb èxit<br><br>";
	//Fase de Vinculació
	if (!$sentencia->bind_param("ssi", $nou_nom,$nou_email,$codi)) { //Vinculació i tractament d'error durant la vinculació 
		echo "Actualització d'un registre - Error en la fase de vinculació: (" . $sentencia->errno . ") " . $sentencia->error;
		$connbd->close();
		exit();
	}
	else echo "Actualització d'un registre: Fase de vinculació realitzada amb èxit<br><br>";
	//Fase d'Execució
	if (!$sentencia->execute()) { // Execució i tractament d'error durant l'execució
		echo "Actualització d'un registre - Error en la fase d'execució: (" . $sentencia->errno . ") " . $sentencia->error;
		$connbd->close();
		exit();
	}
	else echo "Actualització d'un registre: Execució realitzada amb èxit<br><br>";
	//
	// MOSTRANT EL REGISTRE DESPRÉS DE LACTUALITZACIÓ
	echo "<u>3- Mostrant les dades actualitzades del registre identificat amb el codi $codi </u><br><br>";
	//Fase de Preparació.
	$sql = "select * from $taula where codi = ?"; // Sentència SQL Parametritzada
	$sentencia = $connbd -> prepare($sql); //Prepara
	if (!$sentencia){
		echo "Mostrant les dades del registre actualitzat - Error en la fase de preparació: (" . $connbd->errno . ") " . $connbd->error;
		$connbd->close();
		exit();
	} 
	else echo "Mostrant les dades del registre actualitzat: Fase de preparació finalitzada amb èxit<br><br>";
	//Fase de Vinculació
	if (!$sentencia->bind_param("i", $codi)) { //Vinculació i tractament d'error durant la vinculació 
	echo "Mostrant les dades del registre actualitzat - Error en la fase de vinculació: (" . $connbd->errno . ") " . $connbd->error;
		$connbd->close();
		exit();
	} 
	else echo "Mostrant les dades del registre actualitzat: Fase de vinculació finalitzada amb èxit<br><br>";
	//Fase d'Execució
	if (!$sentencia->execute()) { // Execució i tractament d'error durant l'execució
		echo "Mostrant les dades del registre actualitzat- Error en la fase d'execució: (" . $sentencia->errno . ") " . $sentencia->error;
		$connbd->close();
		exit();
	}
	else echo "Mostrant les dades del registre actualitzat: Execució realitzada amb èxit<br><br>";
	// Recollida de les dades de la consulta
	if (!($resultat=$sentencia->get_result())) { //El resultat de l'execució de la sentència SQL es desa dins del objecte $resultat
		echo "Mostrant les dades del registre actualitzat- Error en la recollida de les dades: (" . $sentencia->errno . ") " . $sentencia->error;
		$connbd->close();
		exit();
	}
	else {
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
	}
	//TANCAMENT DE LA CONNEXIÓ
	echo "<br><u>4- Tancant la connexió amb la base de dades $bdcli</u><br><br>";
	if ($connbd->close()) echo "Connexió amb la base de dades $baseDades tancada amb èxit";
	else echo "La connexió amb la base de dades $baseDades no ha pogut tancar-se";
?>
