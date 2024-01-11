<?php
	#
	echo "<h2>Lectura de BD - PDO - Errors amb try-catch</h2>";
	#
	$dbhost="localhost";
	$dbusername="adcli";
	$dbuserpassword="FjeClot23@";
	$baseDades="bdcli"; 
	#
	$registre=3;
	#
	try{
		$pdo = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); # Mode de gestió d'errors de PDO tipus exception
		echo "<b>Connexió a la BD  $baseDades realitzada amb èxit</b><br><br>";
		$consulta = "SELECT * FROM tlcli WHERE codi=$registre";
		$resultat = $pdo->query($consulta);
		echo "<b><u>Registre amb el codi $registre de la base de dades $baseDades: </u></b><br><br>";
		echo "<table style='border:1px solid black; border-collapse:collapse;'>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Codi</b></td>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Nom</b></td>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Cognom</b></td>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>email</b></td>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Contrasenya</b></td>\n";
		$fila = $resultat->fetch(PDO::FETCH_ASSOC);
		echo "\t<tr>\n";
		foreach ($fila as $valor_columna) {
			echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'> $valor_columna </td>\n";
		}
		echo "\t</tr>\n";
		echo "</table>\n";
		$pdo=null;//Tancant connexió
	} catch(PDOException $e){
		print "Error!!! ".$e->getMessage()."<br>";
		die();
	}	
?>

