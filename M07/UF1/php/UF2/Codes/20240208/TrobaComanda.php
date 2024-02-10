<?php
	#
	echo "<h3>LLEGEIX COMANDES D'UN USUARI</h3>";
	#
	# DADES CONNEXIÓ A BD
	#
	$dbhost="localhost";
	$dbusername="adcli";
	$dbuserpassword="FjeClot23@";
	$baseDades="bdcli"; 
	#
	# DADES A MOSTRAR
	$codi=2;
	$valor=8.25;
	#
	try{
		$bd = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
		$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); # Mode de gestió d'errors de PDO tipus exception
		$bd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); # Per defecte cada la línia de la taula es recollida com un array associatiu. Els índex són els camps de la taula.
		//Preparació
		$sql = "SELECT
				tlcli.nom, tlcmd.id_comanda, tlcmd.estat_comanda from tlcli,tlcmd
				WHERE tlcli.codi = tlcmd.codicli AND tlcmd.codicli=".$codi. " AND tlcmd.valor_comanda=".$valor;
		$sentencia = $bd -> prepare($sql);
		//Vinculació. 
		$sentencia->bindParam(1, $nom);
		$sentencia->bindParam(2, $id);
		$sentencia->bindParam(3, $estat);
		//Execució
		$sentencia->execute();
		//Recollida de dades i Visualització dels resultats
		echo "<b><u>Registres de la base de dades $baseDades: </u></b><br><br>";
		echo "<table style='border:1px solid black; border-collapse:collapse;'>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Nom Client</b></td>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>ID Comanda</b></td>\n";
		echo "\t\t<td style='border:1px solid black; border-collapse:collapse;'><b>Estat Comanda</b></td>\n";
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
