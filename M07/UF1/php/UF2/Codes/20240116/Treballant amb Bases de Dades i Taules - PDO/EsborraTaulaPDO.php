<?php
	$host='localhost';
	$user='admin2';
	$pwd='ClotFje23#';
	$bd='daw2';
	$taula='taula02';
	try{
		$pdo = new PDO("mysql:host=$host;dbname=$bd",$user,$pwd);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Conenxió amb la base de dades $baseDades realitzada amb èxit<br><br><br>";
		$ordre_sql = 'DROP TABLE '. $taula;             
		$pdo->exec($ordre_sql);
		echo "Taula esborrada amb èxit<br>";
		$pdo=null;//Tancant connexió
	} catch(PDOException $e){
		die("Error!!! ".$e->getMessage());
	}
?>
