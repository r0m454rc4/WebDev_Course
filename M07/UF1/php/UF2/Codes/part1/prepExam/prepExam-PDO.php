<?php
	#
	echo "<b><u>PROCEDIMENTS EMMAGATZEMATS A LA BASE DE DADES - PDO</u></b><br><br>";
	#
	# Dades de la connexió 
	#
	$dbhost="localhost";
	$dbusername="root";
	$dbuserpassword="fjeclot";
	$baseDades="testExam";
	$taula="testForm";
	$codi = $_POST['codiUsuari'];
	#
	try{
		# Connexió a la base de dades
		$pdo = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
		#
		
		# Emmagatzemant un procediment en la base de dades.
		# Es pot veure el procediment executant dins del servidor--> SHOW PROCEDURE STATUS;
		$pdo->query("DROP PROCEDURE IF EXISTS prepExam"); // Esborra el procediment si ja exisitia
		$pdo->query("CREATE PROCEDURE prepExam(				
						IN id int)
						BEGIN
							delete from $taula where id_usuari=id;
						END");
		
		# Crida al procediment
		$consulta = "CALL prepExam($codi)";
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