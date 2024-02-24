<?php
	$host='localhost';
	$user='romsar';
	$pwd='fjeclot24';
	$bd='empresa_romasar';
	$taula='directius'; 

  // describe directius;
	try {
		$pdo = new PDO("mysql:host=$host;dbname=$bd",$user,$pwd);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connexió amb la base de dades $bd realitzada amb èxit<br><br><br>";
		$sql = "CREATE TABLE ".$taula." (
      id_directiu int(4) unsigned auto_increment primary key,
      id_treballador int(5) unsigned not null,
      foreign key (id_treballador)
					REFERENCES treballadors_romsar(id)
					ON DELETE CASCADE
					ON UPDATE CASCADE,
      observacions varchar(150) not null
    )";             
		$pdo->exec($sql);
		$error = $pdo->errorInfo();		
		echo "Nova taula: ".$taula." creada amb exit<br>";
		$pdo=null;
	} catch(PDOException $e){
		print "Error de creacio de taula: ".$e->getMessage()."<br>";
		die();
	}
?>
