<?php
	//
	// Dades de la connexió
    //
    $servidor = 'localhost';
    $root_mysql = 'root';
    $ctsnya_root_mysql = 'FjeClot23@';
    // Dades de la BD
    $bd = 'daw2';
	//
	//Connexió i creació de la base dades i l'usuari amb permisos d'accés
    //
    try {
        $pdo = new PDO("mysql:host=$servidor", $root_mysql, $ctsnya_root_mysql);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); # Mode de gestió d'errors de PDO tipus exception
        $pdo->exec("DROP DATABASE `$bd`");
		echo "Base de dades $bd esborrada correctament";
        $pdo=null;
    }
    catch (PDOException $e) {
        die("DB ERROR: " . $e->getMessage());
    }
?>
