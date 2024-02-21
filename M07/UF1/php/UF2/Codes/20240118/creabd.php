<?php
	// Dades de la connexió
    //
    $servidor = 'localhost';
    $usuari_root_mysql = 'root';
    $ctsnya_root_mysql = 'FjeClot23@';

    // Dades per la nova base de dades
    $usuari = 'romasarcas';
    $ctsnya_usuari = 'ClotFje23#';
    $nom_bd = 'daw2rosaca';
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
	$sql="CREATE DATABASE $nom_bd";
	$connexio->query($sql) or die("Error en la creació de la base de dades<br>");
	echo "Base de dades $nom_bd creada amb èxit<br>";
	$sql="CREATE USER '$usuari'@'$servidor' IDENTIFIED BY '$ctsnya_usuari'";
	$connexio->query($sql) or die("Error en la creació de l'usuari administrador de la base de dades<br>");
	echo "Creat l'usuari administrador $usuari de la base de dades $nom_bd<br>";
	$sql="GRANT ALL ON $nom_bd.* TO '$usuari'@'$servidor'";
	$connexio->query($sql) or die("Error donant privilegis a l'administrador de la base de dades<br>");
	echo "Donant privilegis a l'administrador $usuari de la base de dades $nom_bd<br>";
	$sql="FLUSH PRIVILEGES"; #  https://linuxhint.com/flush-privileges-mysql/
	$connexio->query($sql) or die("Error d'execució flush privileges");
	echo "flush privileges executat amb èxit";
	$connexio->close();        
?>
