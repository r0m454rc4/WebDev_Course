<?php
	#
	echo "<b><u>PROCEDIMENTS EMMAGATZEMATS A LA BASE DE DADES - PDO</u></b><br><br>";
	#
	# Dades de la connexió 
	#
	$dbhost="localhost";
	$dbusername="root";
	$dbuserpassword="fjeclot";
	$baseDades="testExam";
	$taula="testForm";
	$nomUsuari = $_POST['nomUsuari'];
	#
	try{
		# Connexió a la base de dades
		$pdo = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
		#
		
		# Emmagatzemant un procediment en la base de dades.
		# Es pot veure el procediment executant dins del servidor--> SHOW PROCEDURE STATUS;
		$pdo->query("DROP PROCEDURE IF EXISTS prepCreate3Alumns"); // Esborra el procediment si ja exisitia
		$pdo->query("CREATE PROCEDURE prepCreate3Alumns()
						BEGIN
							set @nalum = 1;
							while @nalum <= 3 do
								insert into $taula (nom_usuari,contrasenya_usuari) values (concat('$nomUsuari',@nalum), concat('fjeclot',@nalum));		
								set @nalum = @nalum + 1;
							end while; 
						END");
		
		# Crida al procediment
		$consulta = "CALL prepCreate3Alumns()";
		$pdo->exec($consulta);
		echo "Registres creats." . "<br><br>";

		echo "<b>Connexió a la BD  $baseDades realitzada amb èxit</b><br><br>";
		$consulta1 = "SELECT * FROM $taula";
	
		// query($consulta) is to query the specified consult.
		$resultat = $pdo->query($consulta1);
		echo "<b><u>Entrades de la base de dades <i>$baseDades</i>: </u></b><br><br>";
		echo "<table style='border:1px solid black; border-collapse:collapse;'>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Id usuari</b></td>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Nom usuari</b></td>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Contrasenya usuari</b></td>\n";
	
		while ($fila = $resultat->fetch(PDO::FETCH_ASSOC)) {
			echo "\t<tr>\n";
			foreach ($fila as $valor_columna) {
				echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'> $valor_columna </td>\n";
			}
			echo "\t</tr>\n";
		}
		echo "</table>\n";
		echo "<br><b>Total registres:</b> " . $resultat->rowCount();
		
		#
		# Tancament de la connexió
		$pdo=null;
	} catch(PDOException $e){
		print "Error!!! ".$e->getMessage()."<br>";
		$pdo=null;
		die();
	}	
?>