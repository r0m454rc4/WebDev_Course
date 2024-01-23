<?php
	//
	// Dades de la connexió
    //
    $servidor = 'localhost';
    $usuari_root_mysql = 'root';
    $ctsnya_root_mysql = 'FjeClot23@';
    // Dades per la nova base de dades
    $nom_bd = 'daw';
	//
	//Connexió i creació de la base dades i l'usuari amb permisos d'accés
    //
    $connexio = new mysqli($servidor, $usuari_root_mysql, $ctsnya_root_mysql);
    if ($connexio->connect_errno){
		printf("Problema de connexió a MySQL: %s\n", $connexio->connect_error);
		exit();
	}
	else {
		echo "<b>Connexió a MySQL realitzada amb èxit</b><br><br>";
	}
	$sql="DROP DATABASE $nom_bd";
	$connexio->query($sql) or die("Error esborrant la base de dades $nom_bd<br>");
	echo "Base de dades $nom_bd esborrada amb èxit<br>";
	$connexio->close();        
?>
