<?php
	$dbhost='localhost';
	$dbusername='admin';
	$dbuserpassword='ClotFje23#';
	$baseDades='daw';
	$tab='taula01'; 
	$mysqli = new mysqli($dbhost,$dbusername,$dbuserpassword,$baseDades);
	if ($mysqli->connect_errno){
		echo "Problema de connexió a la BD";
	} else {
		echo "<b>Connexió a la BD  $baseDades realitzada amb èxit</b><br><br>";
	}
	$ordre_sql = 'DROP TABLE IF EXISTS '.$tab;
	$mysqli->query($ordre_sql) or die('Error esborrant la taula: ' . $mysqli->errno . $mysqli->error);
	echo "Taula esborrada amb èxit<br>";
	$mysqli->close();
?>
