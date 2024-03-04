<?php
	#
	echo "<b><u>PROCEDIMENTS EMMAGATZEMATS A LA BASE DE DADES - PDO</u></b><br><br>";
	#
	# Dades de la connexió 
	#
	$dbhost="localhost";
	$dbusername="romsar";
	$dbuserpassword="fjeclot24";
	$baseDades="empresa_romasar";
	$taula="treballadors_romsar";
	$categoria = $_GET['categoria'];
	#
	try {
		# Connexió a la base de dades
		$pdo = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
		
		echo "<b>Connexió a la BD  $baseDades realitzada amb èxit</b><br><br>";
		$consulta = "SELECT * FROM $taula WHERE categoria=$categoria";
	
		// query($consulta) is to query the specified consult.
		$resultat = $pdo->query($consulta);
		echo "<b><u>Entrades de la base de dades <i>$baseDades</i>: </u></b><br><br>";
		echo "<table style='border:1px solid black; border-collapse:collapse;'>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>ID</b></td>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Nom</b></td>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Cognoms</b></td>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Categoria</b></td>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Observacions</b></td>\n";
	
		while ($fila = $resultat->fetch(PDO::FETCH_ASSOC)) {
			echo "\t<tr>\n";
			foreach ($fila as $valor_columna) {
				echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'> $valor_columna </td>\n";
			}
			echo "\t</tr>\n";
		}
		echo "</table>\n";
		
		#
		# Tancament de la connexió
		$pdo=null;
	} catch(PDOException $e){
		print "Error!!! ".$e->getMessage()."<br>";
		$pdo=null;
		die();
	}	
?>