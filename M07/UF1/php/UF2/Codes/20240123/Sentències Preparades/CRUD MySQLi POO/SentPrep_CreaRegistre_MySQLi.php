<?php
	$dbhost="localhost";
	$dbusername="adcli";
	$dbuserpassword="FjeClot23@";
	$baseDades="bdcli";
	$taula="tlcli";
	#Connexió a la base de dades
	$connbd = new mysqli($dbhost,$dbusername,$dbuserpassword,$baseDades);
	if ($connbd->connect_errno){
		printf("Problema de connexió a la BD: %s\n", $mysqli->connect_error);
		exit();
	}	
	else echo "<b>Connexió a la BD  $baseDades realitzada amb èxit</b><br><br>";
	//Fase de Preparació
	// Here I send the query.
	$sentencia = $connbd -> prepare("insert into $taula(nom,cognoms,email,ctsnya) values(?,?,?,?)");
	if (!$sentencia){
		echo "Error en la fase de preparació: (" . $connbd->errno . ") " . $connbd->error;
		$connbd->close();
		exit();
	} 
	else echo "Fase de preparació finalitzada amb èxit<br><br>";
	//Fase de Vinculació.
	//Nota 1: No és obligatori que el nom de la variable sigui igual nom del camp.
	//Nota 2: i --> integer, s --> string, d --> double, b --> BLOB Binari Large Object (https://phppot.com/php/mysql-blob-using-php/). Permeten emmagatzema imatges, pdf, documents office, etc..

	// nom is stored on the first string, also is stored on the first question mark on "values(?,?,?,?)" in line 15.
	$sentencia->bind_param("ssss", $nom, $cognoms, $email, $ctsnya);
	if (!$sentencia) {
		echo "Error de vinculació: (" . $sentencia->errno . ") " . $sentencia->error;
		$connbd->close();
		exit();
	}
	else echo "Fase de vinculació realitzada amb èxit<br><br>";
	//Assignació del valor a cada paràmetre i enviament al servidor amb ordre d'execució
	$nom="Hèctor";
	$cognoms="Gómez González";
	$email="hgg@daw2.net";
	$ctsnya="";

	// execute() is to send the data that is vinculed previously.
	if (!$sentencia->execute()) {
		echo "Error d'execució: (" . $sentencia->errno . ") " . $sentencia->error;
		$connbd->close();
		exit();
	}
	else echo "Execució realitzada amb èxit<br><br>";
	//Assignació del valor a cada paràmetre i enviament al servidor amb ordre d'execució
	$nom="Carles";
	$cognoms="Tamariu Tona";
	$email="ctt@fjesencs.edu";
	$ctsnya="";
	if (!$sentencia->execute()) {
		echo "Error d'execució: (" . $sentencia->errno . ") " . $sentencia->error;
		$connbd->close();
		exit();
	}
	else echo "Execució realitzada amb èxit<br><br>";
	//Missatge
	echo "Les noves dades s'han introduït a la taula $taula de la base de dades $bdcli<br><br>";
	//Tancament connexió
	$connbd->close();
?>
