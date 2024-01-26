<?php
	#
	echo "<h3>Creació registre- PDO - Errors amb try-catch - Sentencies preparades</h3>";
	#
	# DADES CONNEXIÓ A BD
	#
	$dbhost="localhost";
	$dbusername="rosaca";
	$dbuserpassword="FjeClot23@";
	$baseDades="rosaca23"; 
	#
	#
	# DADES TAULA
	#
	$taula="rosaca2023";
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
		$nom="Victor";
		$cognoms="Toro Arias";
		$email="vitoar@daw2.net";
		$ctsnya="";
		$sentencia->execute();

		$nom="Alejandro";
		$cognoms="Torrente Martin";
		$email="altoma@clotencs.edu";
		$ctsnya="";		
		$sentencia->execute();

		$nom="Roma";
		$cognoms="Sarda Casellas";
		$email="rosaca@clotencs.edu";
		$ctsnya="";		
		$sentencia->execute();
		
		$nom="Toni";
		$cognoms="Varon Martinez";
		$email="altoma@clotencs.edu";
		$ctsnya="";		
		$sentencia->execute();

		$nom="Pepa";
		$cognoms="La Cerda";
		$email="pelace@clotencs.edu";
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
