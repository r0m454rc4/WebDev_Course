<?php
	$host='localhost';
	$user='adcli';
	$pwd='FjeClot23@';
	$bd='bdcli';
	$nova_taula='tlcmd'; 
	try{
		$pdo = new PDO("mysql:host=$host;dbname=$bd",$user,$pwd);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connexió amb la base de dades $bd realitzada amb èxit<br><br><br>";
		$sql = "CREATE TABLE ".$nova_taula." (
				id_comanda INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				estat_comanda VARCHAR(10),
				valor_comanda DECIMAL(5,2),
				codicli INT(10) UNSIGNED NOT NULL,
				INDEX (codicli), 
				FOREIGN KEY (codicli)
					REFERENCES tlcli(codi)
					ON DELETE CASCADE
					ON UPDATE CASCADE					
				);"; //IMPORTANT: A LA LÍNIA 15, EL CAMP codicli HA DE TENIR EL MATEIX TIPUS QUE EL CAMP codi DE LA TAULA tlci             
		$pdo->exec($sql);
		echo "Nova taula $nova_taula creada amb èxit<br><br><br>";
		$pdo=null;
	} catch(PDOException $e){
		print "Error!!! ".$e->getMessage()."<br>";
		$pdo=null;
		die();
	}
	// Proves posteriors:
	// Insertació d'una nova comanda amb codicli ok en tlcmd (perquè existeix mateix codi en tlcli) --> Sí Entra comanda
	// Insertar una nova comanda amb codicli ko en tlcmd (perquè no existeix mateix codi en tlcli)--> No Entra comanda--> Error
	// Actualització de codi de tlcli --> Actualització de codicli de tlcmd
	// Select de totes les comandes d'un client amb el seu codi de tlcli
?>

