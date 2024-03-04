<?php
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
		$pdo->query("DROP PROCEDURE IF EXISTS llegeix_noms"); // Esborra el procediment si ja exisitia
		$pdo->query("CREATE PROCEDURE llegeix_noms(				
						IN nomE varchar(10))
						BEGIN
							select * from tlcli where nom=nomE;							
						END");	// Creació i emmagatzematge del procediment. Recorda que tlcli és una taula de bdcli		
		# Crida al procediment
		$nE = $_GET['nomEntrat'];
		$consulta = "CALL llegeix_noms($nE)";
		$pdo->exec($consulta);
		echo "Resultat correcte" . "<br>";
		echo "Query: " . $consulta;

		# Tancament de la connexió
		$pdo=null;
	} catch(PDOException $e){
		print "Error!!! ".$e->getMessage()."<br>";
		$pdo=null;
		die();
	}	
?>

