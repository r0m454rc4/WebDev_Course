<?php
	#
	echo "<h3>Creació registre- PDO - Errors amb try-catch - Sentencies preparades</h3>";
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
	try{
		$bd = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
		$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); # Mode de gestió d'errors de PDO tipus exception
		//Preparació
		$sentencia = $bd -> prepare("insert into $taula(nom,cognoms,email,ctsnya) values (?,?,?,?)");
		//Vinculació. No és obligatori que el nom de la variable sigui igual nom del camp.
		$sentencia->bindParam(1, $nom);
		$sentencia->bindParam(2, $cognoms);
		$sentencia->bindParam(3, $email);
		$sentencia->bindParam(4, $ctsnya);
		//Assignació del valor a cada paràmetre i enviament al servidor amb ordre d'execució
		$nom="Francesca";
		$cognoms="Siurana Sants";
		$email="fss@daw2.net";
		$ctsnya="";
		$sentencia->execute();
		//Assignació del valor a cada paràmetre i enviament al servidor amb ordre d'execució
		$nom="Anna";
		$cognoms="Llopis Lopéz";
		$email="rll@clotencs.edu";
		$ctsnya="";		
		$sentencia->execute();
		//Tancament sessió	
		echo "Dades introduïdes amb exit<br>";	
		$bd=null;//Tancant connexió
	} catch(PDOException $e){
		print "Error!!! ".$e->getMessage()."<br>";
		die();
	}	
?>
