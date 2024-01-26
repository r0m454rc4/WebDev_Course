<?php
	#
	echo "<b><u>TRANSACCIONS MySQLi AMB SENTÈNCIES PREPARADES</u></b><br><br>";
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
	//CONNEXIÓ A LA BASE DE DADES
	echo "<u>1- Connexió a la base de dades $baseDades</u><br><br>"; 
	$bd = new mysqli($dbhost,$dbusername,$dbuserpassword,$baseDades);
	//
	// INICI DE LA TRANSACCIÓ
	echo "<u>2- inici de la Transacció</u><br><br>";
	// This is to disable autocommit, is useful to prevent errors, because if I have one, the rollback (recover data without applying the modified data that have errors) will execute.
	$bd->autocommit(FALSE);
	//
	// TRANSACCIONS A REALITZAR
	echo "<u>3- inici de la Transacció</u><br><br>";
	//Preparacions
	$sql = "INSERT INTO $taula (nom,cognoms,email,ctsnya) VALUES (?,?,?,?)";
	$sentencia = $bd->prepare($sql);
	// Vinculacions
	$sentencia->bind_param("ssss", $nom, $cognoms, $email, $ctsnya);
	// Execucions
	$nom="Jordi";
	$cognoms="Bonaventura Blay";
	$email="jbb@dawsencs.net";
	$ctsnya="";
	$sentencia->execute();
	//
	$nom="David";
	$cognoms="Niubó Navals";
	$email="dnn@clotencs.net";
	$ctsnya="";
	$sentencia->execute();
	//
	$nom="Edelvira";
	$cognoms="Altamira Pons";
	$email="edelvira@fje.net";
	$ctsnya="";
	$sentencia->execute();
	//	
	// COMMIT DE LA TRANSACCIÓ
	echo "<u>4- Commit de la Transacció</u><br><br>"; 
	if(!$bd->commit()){ //Comprova que passa si comentes les línies 53 a 58
		echo "Error de transacció<br>";
		$bd->rollback();
		$bd->close();
		exit();		
	}	
	echo "<u>5- Transacció finalitzada</u><br><br>";
	//TANCAMENT DE LA CONNEXIÓ
	echo "<u>6- Tancament de la connexió a la base de dades $baseDades</u><br><br>"; 
	$bd->close();				
?>
