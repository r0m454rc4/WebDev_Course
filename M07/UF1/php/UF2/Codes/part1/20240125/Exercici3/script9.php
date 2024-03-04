<?php
	$dbhost='localhost';
	$dbusername='adcli';
	$dbuserpassword='FjeClot23@';
	$baseDades='bdcli';
	$taula='tlcli';
	//Connexió
	$connbd = new mysqli($dbhost,$dbusername,$dbuserpassword,$baseDades);
	if ($connbd->connect_errno){
		echo "Problema de connexió a la BD<br><br>";
	}
	# Consultes	
	$nom="^p"; // Regular expression. String that starts with "p"
	$emaildom=".com$"; // Regular expression. String that ends with ".com"
	$consulta .= "select * from $taula where nom regexp '$nom';";//Important el punt davant l'igual per concatenar cadenes
	$consulta .= "select * from $taula where email regexp '$emaildom';"; //Important el punt davant l'igual per concatenar cadenes

	// multi_query is to be able to make multiple queries at once. 
	if(!$connbd -> multi_query($consulta)) echo "Error de sentència múltiple";
	else{
		do{
			$resultat=$connbd->store_result();//s'agafa el resultat d'una consulta
			echo "<table border=1>\n";
			while ($fila = $resultat->fetch_assoc()) {
				echo "\t<tr>\n";
				foreach ($fila as $valor_columna) {
					echo "\t\t<td> $valor_columna </td>\n";
				}
				echo "\t</tr>\n";
			}
			echo "</table>\n";
			echo "<br>";
			$resultat->free();
			echo"###############<br><br>";			 
		}while($connbd->more_results() && $connbd->next_result()); //mentre no finalitzin les consultes
	}
	//Tancant connexió
	$connbd->close();			
?>
