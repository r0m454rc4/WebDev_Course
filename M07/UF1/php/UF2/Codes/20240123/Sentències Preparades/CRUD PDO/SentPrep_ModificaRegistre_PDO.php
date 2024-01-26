<?php
	#
	echo "<b><u>MODIFICACIÓ D'UN REGISTRE UTILITZANT PDO I SENTENCIES PREPARADES</u></b><br><br>";
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
	# DADES PER REALITZAR LA MODIFICACIÓ
	$codi=5; // Codi del registre a modificar
	$nou_nom="Maria"; // Nou nom
	$nou_email="40615.clot@fje.edu"; // Nou email
	#
	try{
		//CONNEXIÓ A LA BASE DE DADES
		echo "<u>1- Connexió a la base de dades $bdcli</u><br><br>"; 
		$bd = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
		$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); # Mode de gestió d'errors de PDO tipus exception
		$bd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); # Cada la línia de la taula es recollida com un array associatiu. Els índex són els camps de la taula.
		echo "Connexió a la BD  $baseDades realitzada amb èxit</b><br><br>";
		//
		// ACTUALITZANT EL REGISTRE
		echo "<u>2- Modificant el registre amb el codi $codi amb el nou nom $nou_nom i el nou email email $nou_email</u><br><br>";
		//Fase de Preparació
		$sql="UPDATE $taula SET nom=?, email=? WHERE codi = ?"; // Sentencia SQL parametritzada
		$sentencia = $bd -> prepare($sql);
		echo "Actualització d'un registre: Fase de preparació finalitzada amb èxit<br><br>";
		//Fase de Vinculació
		$sentencia->bindParam(1, $nou_nom);
		$sentencia->bindParam(2, $nou_email);
		$sentencia->bindParam(3, $codi);
		echo "Actualització d'un registre: Fase de vinculació realitzada amb èxit<br><br>";
		//Fase d'Execució
		$sentencia->execute();
		echo "Actualització d'un registre: Execució realitzada amb èxit<br><br>";
		//
		// MOSTRANT EL REGISTRE DESPRÉS DE LACTUALITZACIÓ
		echo "<u>3- Mostrant les dades actualitzades del registre identificat amb el codi $codi </u><br><br>";
		//Fase de Preparació.
		$sql = "select * from $taula where codi = ?"; // Sentència SQL Parametritzada
		$sentencia = $bd -> prepare($sql); //Prepara
		echo "Mostrant les dades del registre actualitzat: Fase de preparació finalitzada amb èxit<br><br>";
		//Fase de Vinculació
		$sentencia->bindParam(1, $codi);
		echo "Mostrant les dades del registre actualitzat: Fase de vinculació finalitzada amb èxit<br><br>";
		//Fase d'Execució
		$sentencia->execute();
		echo "Mostrant les dades del registre actualitzat: Execució realitzada amb èxit<br><br>";
		// Recollida de les dades de la consulta
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
		//
		//TANCAMENT DE LA CONNEXIÓ	
		echo "<br><u>4- Tancament de la connexió</u><br><br>";
		$bd=null;//Tancant connexió
		echo "Connexió tancada<br><br>";
	} catch(PDOException $e){
		print "Error!!! ".$e->getMessage()."<br>";
		$bd=null;//Tancant connexió
		die();
	}	
?>
