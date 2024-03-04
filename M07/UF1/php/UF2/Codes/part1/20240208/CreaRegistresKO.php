<?php
	#
	echo "<h3>CREACIÓ DE REGISTRE DINS DE tlcmd- FUNCIONAMENT KO</h3>";
	echo "<h4>Funcionament KO perquè el valor del camp codicli NO té un valor igual a un altre existent al camp codi de tlcli</h4>";
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
	$taula="tlcmd";
	#
	try{
		$bd = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
		$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); # Mode de gestió d'errors de PDO tipus exception
		//Preparació
		$sentencia = $bd -> prepare("insert into $taula(estat_comanda,valor_comanda,codicli) values (?,?,?)");
		//Vinculació. No és obligatori que el nom de la variable sigui igual nom del camp.
		$sentencia->bindParam(1, $estat_comanda);
		$sentencia->bindParam(2, $valor_comanda);
		$sentencia->bindParam(3, $codicli);
		//Assignació del valor a cada paràmetre i enviament al servidor amb ordre d'execució
		$estat_comanda="lliurada";
		$valor_comanda=79.20;
		$codicli=13; // AQUEST CODI DE CLIENT NO EXISTEIX A tlcli
		$sentencia->execute();
		//Tancament sessió	
		echo "Dades introduïdes amb exit<br>";	
		$bd=null;//Tancant connexió
	} catch(PDOException $e){
		print "Error!!! ".$e->getMessage()."<br>";
		$bd=null;
		die();
	}	
?>
