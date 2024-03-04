<?php
	$host='localhost';
	$user='adcli';
	$pwd='FjeClot23@';
	$bd='bdcli';
	$nova_taula='tlcmd2'; 
	try{
		$pdo = new PDO("mysql:host=$host;dbname=$bd",$user,$pwd);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connexió amb la base de dades $bd realitzada amb èxit<br><br><br>";
		$sql = "CREATE TABLE ".$nova_taula."(
				id_comanda INT(10),
				id_client VARCHAR(10),
				estat_comanda VARCHAR(10),
				valor_comanda DECIMAL(5,2),
				PRIMARY KEY (id_comanda, id_client)
				);";
		$pdo->exec($sql);
		echo "Nova taula $nova_taula creada amb èxit<br><br><br>";
		$pdo=null;
	} catch(PDOException $e){
		print "Error!!! ".$e->getMessage()."<br>";
		$pdo=null;
		die();
	}
?>

