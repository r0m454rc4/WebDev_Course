<?php
	#
	echo "<b><u>PROCEDIMENTS EMMAGATZEMATS A LA BASE DE DADES - PDO</u></b><br><br>";
	#
	# Dades de la connexió 
	#
	$dbhost="localhost";
	$dbusername="adcli";
	$dbuserpassword="FjeClot23@";
	$baseDades="bdcli"; 
	#
	try{
		# Connexió a la base de dades
		$pdo = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
		#
		# Emmagatzemant un procediment en la base de dades.
		# Es pot veure el procediment executant dins del servidor--> SHOW PROCEDURE STATUS WHERE DB=bdcli
		$pdo->query("DROP PROCEDURE IF EXISTS esborra_registre"); // Esborra el procediment si ja exisitia
		$pdo->query("CREATE PROCEDURE esborra_registre(				
						IN id int)
						BEGIN
							delete from tlcli where codi=id;							
						END");	// Creació i emmagatzematge del procediment. Recorda que tlcli és una taula de bdcli
		#
		# Crida al procediment
		$consulta = 'CALL esborra_registre(5)';
		$pdo->exec($consulta);
		echo "Registre esborrat";
		#
		# Tancament de la connexió
		$pdo=null;
	} catch(PDOException $e){
		print "Error!!! ".$e->getMessage()."<br>";
		$pdo=null;
		die();
	}	
?>

