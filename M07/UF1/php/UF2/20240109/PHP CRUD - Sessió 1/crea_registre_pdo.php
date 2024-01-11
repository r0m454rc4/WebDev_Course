<?php
	#
	echo "<h2>Lectura de BD - PDO - Errors amb try-catch</h2>";
	#
	# DADES CONNEXIÓ A BD
	#
	$dbhost="localhost";
	$dbusername="adcli";
	$dbuserpassword="FjeClot23@";
	$baseDades="bdcli"; 
	#
	#
	# DADES TAULA
	#
	$taula="tlcli";
	#
	try{
		$bd = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
		$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); # Mode de gestió d'errors de PDO tipus exception
		$peticio = "INSERT INTO $taula (nom,cognoms,email,ctsnya) VALUES ('lluís','gómez puig','lgom@clot.net','')";
		$bd->exec($peticio); # exec() s'utilitza quan no hi ha un retorn de dades 
		$consulta = "SELECT * FROM $taula";
		$resultat = $bd->query($consulta); # exec() s'utilitza quan hi ha un retorn de dades 
		echo "<b><u>Entrades de la base de dades $baseDades: </u></b><br><br>";
		echo "<table style='border:1px solid black; border-collapse:collapse;'>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Codi</b></td>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Nom</b></td>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Cognom</b></td>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>email</b></td>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Contrasenya</b></td>\n";
		while ($fila = $resultat->fetch(PDO::FETCH_ASSOC)) {
			echo "\t<tr>\n";
			foreach ($fila as $valor_columna) {
				echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'> $valor_columna </td>\n";
			}
			echo "\t</tr>\n";
		}
		echo "</table>\n";
		echo "<br><b>Total registres:</b> " .$resultat->rowCount();
		$pdo=null;//Tancant connexió
	} catch(PDOException $e){
		print "Error!!! ".$e->getMessage()."<br>";
		die();
	}	
?>

