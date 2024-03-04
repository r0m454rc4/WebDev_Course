<?php
	#
	echo "<b><u>ESBORRAMENT D'UN REGISTRE DE tlcli</u></b><br><br>";
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
	$codi=3; 
	#
	try{
		$bd = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
		$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); # Mode de gestió d'errors de PDO tipus exception
		$bd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); # Cada la línia de la taula es recollida com un array associatiu. Els índex són els camps de la taula.
		//Fase de Preparació
		$sql="DELETE FROM $taula WHERE codi = ?"; // Sentencia SQL parametritzada
		$sentencia = $bd -> prepare($sql);
		//Fase de Vinculació
		$sentencia->bindParam(1, $codi);
		//Fase d'Execució
		$sentencia->execute();
		echo "Registre codi = ".$codi." esborrat<br>";
		//Tancament de la connexió
		$bd=null;//Tancant connexió
	} catch(PDOException $e){
		print "Error!!! ".$e->getMessage()."<br>";
		$bd=null;//Tancant connexió
		die();
	}	
?>
