<?php
	$host='localhost';
	$user='admin2';
	$pwd='ClotFje23#';
	$bd='daw2';
	$tab='taula02'; 
	try{
		$pdo = new PDO("mysql:host=$host;dbname=$bd",$user,$pwd);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connexió amb la base de dades $bd realitzada amb èxit<br><br><br>";
		$sql = "CREATE TABLE ".$tab." (
		codi INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		nom VARCHAR(20),
		nota FLOAT)";             
		$pdo->exec($sql);
		$error = $pdo->errorInfo();		
		echo "Taula ".$tab." creada correctament<br>";
		$pdo=null;
	} catch(PDOException $e){
		print "Error!!! ".$e->getMessage()."<br>";
		die();
	}
?>
