<?php
	$dbhost='localhost';
	$dbusername='adcli';
	$dbuserpassword='FjeClot23@';
	$baseDades='bdcli';
	$taula='tlcli';
	#
	$cts="Holabuen0sdias#";
	$codi=1;
	#
	try{
		# Connexió
		$connbd = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
		# Enable exceptions on errors
		$connbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		#Emmagatzemant una contrasenya de manera segura dins de la base de dades
		$hash_cts=password_hash($cts, PASSWORD_DEFAULT);
		$sql = "UPDATE ".$taula." SET ctsnya='".$hash_cts."' WHERE codi=".$codi;
		$connbd->exec($sql);
		echo "Contrasenya emmagatzemada<br><br>";
		#Tancant connexió
		$connbd=null;
	} 
	catch(PDOException $e){
		print "Error!!! ".$e->getMessage()."<br>";
		$connbd=null;
		die();
	}
	
?>
