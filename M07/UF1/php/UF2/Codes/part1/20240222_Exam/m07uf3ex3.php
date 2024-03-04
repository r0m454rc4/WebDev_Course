<?php
	$dbhost="localhost";
	$dbusername="romsar";
	$dbuserpassword="fjeclot24";
	$baseDades="empresa_romasar";
	$taula="treballadors_romsar";

	#Connexió a la base de dades
	$connbd = new mysqli($dbhost,$dbusername,$dbuserpassword,$baseDades);
	if ($connbd->connect_errno){
		printf("Problema de connexió a la BD: %s\n", $mysqli->connect_error);
		exit();
	}	
	else echo "<b>Connexió a la BD  $baseDades realitzada amb èxit</b><br><br>";
	//Fase de Preparació
	$sentencia = $connbd -> prepare("insert into $taula(nom,cognoms,categoria,observacions) values(?,?,?,?)");
	if (!$sentencia){
		echo "Error en la fase de preparació: (". $connbd->errno . ") " . $connbd->error;
		$connbd->close();
		exit();
	} 
	else echo "Fase de preparació finalitzada amb èxit<br><br>";

	$sentencia->bind_param("ssss", $nom, $cognoms, $categoria, $observacions);
	if (!$sentencia) {
		echo "Error de vinculació: (" . $sentencia->errno . ") " . $sentencia->error;
		$connbd->close();
		exit();
	}
	else echo "Fase de vinculació realitzada amb èxit<br><br>";
	//Assignació del valor a cada paràmetre i enviament al servidor amb ordre d'execució
  $nom = $_POST['nom'];
  $cognoms = $_POST['cognoms'];
  $categoria = $_POST['categoria'];
  $observacions = $_POST['observacions'];

	// execute() is to send the data that is vinculed previously.
	if (!$sentencia->execute()) {
		echo "Error d'insersio de dades: (" . $sentencia->errno . ") " . $sentencia->error;
		$connbd->close();
		exit();
	}
  
	//Missatge
	echo "Dades afegides amb exit<br><br>";
	//Tancament connexió
	$connbd->close();
?>
