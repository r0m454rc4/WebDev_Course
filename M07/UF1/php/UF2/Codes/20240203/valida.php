<?php
	$dbhost='localhost';
	$dbusername='adcli';
	$dbuserpassword='FjeClot23@';
	$baseDades='bdcli';
	$taula='tlcli';
	#
	$ctsnya_a_validar="Holabuen0sdias#";
	$codi=1;
	try{
		#Connexió
		$connbd = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
		#Enable exceptions on errors
		$connbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		#Consultant la contrasenya
		$sql = "SELECT ctsnya FROM ".$taula." WHERE codi=".$codi;
		$query_sql = $connbd->query($sql);
		$resultat_consulta = $query_sql->fetch(PDO::FETCH_ASSOC);
		$ctsnya=$resultat_consulta['ctsnya'];
		# Verificant la contrasenya
		if (password_verify($ctsnya_a_validar, $ctsnya)) echo "Contrasenya correcta<br>";
		else echo "Contrasenya incorrecta<br>";
		#Tancant connexió
		$connbd=null;		
	} 
	catch(PDOException $e){
		print "Error!!! ".$e->getMessage()."<br>";
		$connbd=null;
		die();
	}
?>
