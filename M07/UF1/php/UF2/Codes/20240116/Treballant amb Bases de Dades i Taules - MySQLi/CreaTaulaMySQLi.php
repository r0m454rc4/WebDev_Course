<?php
	$host='localhost';
	$user='admin';
	$pwd='ClotFje23#';
	$bd='daw';
	$tab='taula01'; 
	$mysqli = new mysqli($host,$user,$pwd,$bd);
	if ($mysqli->connect_errno)	echo "Problema de connexió a la base de dades $bd";
	else echo "Connexió a la BD  $bd realitzada amb èxit<br><br>";
	$sql = 'CREATE TABLE IF NOT EXISTS '.$tab.' (codi INT NOT NULL AUTO_INCREMENT,nom VARCHAR(20), nota FLOAT, PRIMARY KEY (codi)) CHARACTER SET=utf8';
	$mysqli->query($sql) or die('Creació de la taula fallida: ' . $mysqli->errno . $mysqli->error);
	echo "Taula $tab creada amb èxit<br>";
	$mysqli->close();
?>

