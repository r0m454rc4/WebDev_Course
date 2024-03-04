 <?php
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
	try {
		//CONNEXIÓ A LA BASE DE DADES
		echo "<u>1- Connexió a la base de dades $bdcli</u><br><br>"; 
		$bd = new PDO("mysql:host=$dbhost;dbname=$baseDades",$dbusername,$dbuserpassword);
		$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); # Mode de gestió d'errors de PDO tipus exception
		$bd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); # Cada la línia de la taula es recollida com un array associatiu. Els índex són els camps de la taula.
		echo "Connexió a la BD  $baseDades realitzada amb èxit</b><br><br>";	
		//
		// INICI DE LA TRANSACCIÓ
		echo "<u>2- inici de la Transacció</u><br><br>"; 
		// This is to disable autocommit, is useful to prevent errors, because if I have one, the rollback (recover data without applying the modified data that have errors) will execute.
	    $bd->beginTransaction();
		//
		// TRANSACCIÓ A REALITZAR AMB SENTÈNCIES PREPARADES
		echo "<u>3- Transacció a realitzar</u><br><br>"; 
		//Preparacions
		$sql = "INSERT INTO $taula (nom,cognoms,email,ctsnya) VALUES (?,?,?,?)";
		$sentencia = $bd->prepare($sql);
		// Vinculacions
		$sentencia->bindParam(1,$nom);
		$sentencia->bindParam(2,$cognoms);
		$sentencia->bindParam(3,$email);
		$sentencia->bindParam(4,$ctsnya);
		// Execucions
		$nom="Roma";
		$cognoms="Sarda Gasellas";
		$email="15586185.clot@fje.edu";
		$ctsnya="Pepe";
		$sentencia->execute();

		$nom="Victor";
		$cognoms="Toro Arias";
		$email="victor.toro@gmail.com";
		$ctsnya="picateclas";
		$sentencia->execute();

		$nom="Daniel";
		$cognoms="Colla2";
		$email="dcolla2@proton.me";
		$ctsnya="Hola";
		$sentencia->execute();
		
		$nom="Toni";
		$cognoms="Varon";
		$email="toni.varon@hotmail.com";
		$ctsnya="delegat";
		$sentencia->execute();

		// COMMIT DE LA TRANSACCIÓ
		echo "<u>4- Commit de la Transacció</u><br><br>"; 
		// If I don't make the commit, or something goes wrong, anything will change on the table.
		$bd->commit(); //Comprova que passa si comentes aquesta línia!!!!!!!!!!!!!!!
	} catch(PDOException $e) {
	  // roll back de la transacció si alguna cosa falla
	  $bd->rollback();
	  echo "<u>Errors de la Transacció!!!!!</u><br><br>";
	  echo "Error: " . $e->getMessage();
	  $bd = null;
	  exit();
	}
	//TANCAMENT DE LA CONNEXIÓ
	echo "<u>5- Tancament de la connexió a la base de dades $bdcli</u><br><br>"; 
	$bd = null;
?> 
