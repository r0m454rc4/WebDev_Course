<?php
	#
	echo "<h3>Lectura registre- PDO - Errors amb try-catch - Sentencies preparades</h3>";
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
	# DADES A MOSTRAR
	$nom="sergi";
	$cognoms="dalmau delacroix";
	#
	try{
		
		$bd = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
		$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); # Mode de gestió d'errors de PDO tipus exception
		$bd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); # Per defecte cada la línia de la taula es recollida com un array associatiu. Els índex són els camps de la taula.
		//Preparació
		$sql = "select * from $taula where nom = ? AND cognoms= ?"; // Sentencia SQL parametritzada
		$sentencia = $bd -> prepare($sql);
		//Vinculació. 
		$sentencia->bindParam(1, $nom);
		$sentencia->bindParam(2, $cognoms);
		//Execució
		$sentencia->execute();
		//Recollida de dades i Visualització dels resultats
		echo "<b><u>Registres de la base de dades amb nom $nom i cognoms $cognoms: </u></b><br><br>";
		echo "<table style='border:1px solid black; border-collapse:collapse;'>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Codi</b></td>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Nom</b></td>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Cognom</b></td>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>email</b></td>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Contrasenya</b></td>\n";
		while ($fila = $sentencia->fetch()) {
			echo "\t<tr>\n";
			foreach ($fila as $valor_columna) {
				echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'> $valor_columna </td>\n";
			}
			echo "\t</tr>\n";		
		}
		echo "</table>\n";
		//Tancament sessió	
		$bd=null;//Tancant connexió
	} catch(PDOException $e){
		print "Error!!! ".$e->getMessage()."<br>";
		$bd=null;
		die();
	}	
?>
