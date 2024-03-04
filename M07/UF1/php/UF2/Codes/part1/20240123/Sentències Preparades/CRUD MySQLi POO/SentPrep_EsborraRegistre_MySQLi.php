<?php
	echo "<b><u>ESBORRAMENT D'UN REGISTRE UTILITZANT MySQLi POO</u></b><br><br>";
	// DADE DE LA CONNEXIÓ
	$dbhost="localhost";
	$dbusername="adcli";
	$dbuserpassword="FjeClot23@";
	$baseDades="bdcli";
	$taula="tlcli";
	//
	// DADES DEL REGISTRE A ESBORRAR
	$nom="Francesca"; // Valor del camp nom del registre a esborrar
	$email="fss@daw2.net"; // Valor del camp email del registre a esborrar
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
	// ESBORRANT EL REGISTRE
	echo "<u>2- Esborrant el registre amb el nom $nom i l'email $email</u><br><br>";
	//Fase de Preparació.
	$sql="DELETE FROM $taula WHERE nom = ? AND  email = ?"; // Sentència SQL Parametritzada
	$sentencia = $connbd -> prepare($sql); //Prepara
	if (!$sentencia){
		echo "Esborrament d'un registre - Error en la fase de preparació: (" . $connbd->errno . ") " . $connbd->error;
		$connbd->close();
		exit();
	} 
	else echo "Esborrament d'un registre: Fase de preparació finalitzada amb èxit<br><br>";
	//Fase de Vinculació
	if (!$sentencia->bind_param("ss", $nom,$email)) { //Vinculació i tractament d'error durant la vinculació 
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
	//
	// MOSTRANT QUE EL REGISTRE HA ESTAT ESBORRAT
	echo "<u>3- Mostrant que el registre mab nom $nom i email $email ha estat esborrat</u>u><br><br>";
	//Fase de Preparació.
	$sql = "select * from $taula where nom = ? and email = ?"; // Sentència SQL Parametritzada
	$sentencia = $connbd -> prepare($sql); //Prepara
	if (!$sentencia){
		echo "Mostrant que el registre ha estat esborrat - Error en la fase de preparació: (" . $connbd->errno . ") " . $connbd->error;
		$connbd->close();
		exit();
	} 
	else echo "Mostrant que el registre ha estat esborrat: Fase de preparació finalitzada amb èxit<br><br>";
	//Fase de Vinculació
	if (!$sentencia->bind_param("ss", $nom,$email)) { //Vinculació i tractament d'error durant la vinculació 
	echo "Mostrant que el registre ha estat esborrat - Error en la fase de vinculació: (" . $connbd->errno . ") " . $connbd->error;
		$connbd->close();
		exit();
	} 
	else echo "Mostrant que el registre ha estat esborrat: Fase de vinculació finalitzada amb èxit<br><br>";
	//Fase d'Execució
	if (!$sentencia->execute()) { // Execució i tractament d'error durant l'execució
		echo "Mostrant que el registre ha estat esborrat- Error en la fase d'execució: (" . $sentencia->errno . ") " . $sentencia->error;
		$connbd->close();
		exit();
	}
	else echo "Mostrant que el registre ha estat esborrat: Execució realitzada amb èxit<br><br>";
	// Recollida de les dades de la consulta
	if (!($resultat=$sentencia->get_result())) { //El resultat de l'execució de la sentència SQL es desa dins del objecte $resultat
		echo "Mostrant les dades del registre actualitzat- Error en la recollida de les dades: (" . $sentencia->errno . ") " . $sentencia->error;
		$connbd->close();
		exit();
	}
	else {
		if ($result->num_rows==0) echo "Registre esborrat amb èxit<br>";
		else echo "El registre no ha estat esborrat<br>";
	}
	//TANCAMENT DE LA CONNEXIÓ
	echo "<br><u>4- Tancant la connexió amb la base de dades $bdcli</u><br><br>";
	if ($connbd->close()) echo "Connexió amb la base de dades $baseDades tancada amb èxit";
	else echo "La connexió amb la base de dades $baseDades no ha pogut tancar-se";
?>
