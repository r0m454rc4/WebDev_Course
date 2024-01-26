<?php
	#
	echo "<b><u>ESBORRAMENT D'UN REGISTRE UTILITZANT PDO I SENTENCIES PREPARADES</u></b><br><br>";
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
	// DADES DEL REGISTRE A ESBORRAR
	$nom="Francesca"; // Valor del camp nom del registre a esborrar
	$email="fss@daw2.net"; // Valor del camp email del registre a esborrar
	#
	try{
		//CONNEXIÓ A LA BASE DE DADES
		echo "<u>1- Connexió a la base de dades $bdcli</u><br><br>"; 
		$bd = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
		$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); # Mode de gestió d'errors de PDO tipus exception
		$bd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); # Cada la línia de la taula es recollida com un array associatiu. Els índex són els camps de la taula.
		echo "Connexió a la BD  $baseDades realitzada amb èxit</b><br><br>";
		//
		// ESBORRANT EL REGISTRE
		echo "<u>2- Esborrant el registre amb el nom $nom i l'email $email</u><br><br>";
		//Fase de Preparació
		$sql="DELETE FROM $taula WHERE nom = ? AND  email = ?"; // Sentencia SQL parametritzada
		$sentencia = $bd -> prepare($sql);
		echo "Esborrant el registre: Fase de preparació finalitzada amb èxit<br><br>";
		//Fase de Vinculació
		$sentencia->bindParam(1, $nom);
		$sentencia->bindParam(2, $email);
		echo "Esborrant el registre: Fase de vinculació realitzada amb èxit<br><br>";
		//Fase d'Execució
		$sentencia->execute();
		echo "Esborrant el registre: Execució realitzada amb èxit<br><br>";
		//
		// MOSTRANT QUE EL REGISTRE HA ESTAT ESBORRAT
		echo "<u>3- Mostrant que el registre mab nom $nom i email $email ha estat esborrat</u>u><br><br>";
		//Fase de Preparació.
		$sql = "select * from $taula where codi = ?"; // Sentència SQL Parametritzada
		$sentencia = $bd -> prepare($sql); //Prepara
		echo "Mostrant que el registre ha estat esborrat: Fase de preparació finalitzada amb èxit<br><br>";
		//Fase de Vinculació
		$sentencia->bindParam(1, $codi);
		echo "Mostrant que el registre ha estat esborrat: Fase de vinculació finalitzada amb èxit<br><br>";
		//Fase d'Execució
		$sentencia->execute();
		echo "Mostrant que el registre ha estat esborrat: Fase d'execució finalitzada amb èxit<br><br>";
		// Recollida de les dades de la consulta
		if (!$sentencia->fetch()) echo "Registre esborrat amb èxit<br>";
		else echo "El registre no ha estat esborrat<br>"; 
		//
		//TANCAMENT DE LA CONNEXIÓ	
		echo "<br><u>4- Tancament de la connexió</u><br><br>";
		$bd=null;//Tancant connexió
		echo "Connexió tancada<br><br>";
	} catch(PDOException $e){
		print "Error!!! ".$e->getMessage()."<br>";
		$bd=null;//Tancant connexió
		die();
	}	
?>
