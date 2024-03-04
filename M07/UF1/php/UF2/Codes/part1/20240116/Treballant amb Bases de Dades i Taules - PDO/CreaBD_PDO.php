<?php
	//
	// Dades de la connexió
    //
    $servidor = 'localhost';
    $root_mysql = 'root';
    $ctsnya_root_mysql = 'FjeClot23@';
    $admin_bd = 'admin2';
    $ctsnya_admin_bd = 'ClotFje23#';
    $bd = 'daw2';
	//
	//Connexió i creació de la base dades i l'usuari amb permisos d'accés
    //
    try {
        $pdo = new PDO("mysql:host=$servidor", $root_mysql, $ctsnya_root_mysql);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); # Mode de gestió d'errors de PDO tipus exception
        $pdo->exec("CREATE DATABASE `$bd`;
                CREATE USER '$admin_bd'@'$servidor' IDENTIFIED BY '$ctsnya_admin_bd';
                GRANT ALL ON `$bd`.* TO '$admin_bd'@'localhost';
                FLUSH PRIVILEGES;")
		        or die(print_r($pdo->errorInfo(), true));
		echo "Base de dades $bd i usuari $admin_bd amb permisos d'administració de la base de dades creats correctament";
        $pdo=null;
    }
    catch (PDOException $e) {
        die("DB ERROR: " . $e->getMessage());
    }
?>
