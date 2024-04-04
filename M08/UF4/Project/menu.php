<?php
require 'vendor/autoload.php';
session_start(); // Inici de sessió

if (!isset($_SESSION['adm'])) {
	header("Location: ./index.php");
	exit;
}
?>

<html>

<head>
	<title>
		PÀGINA WEB DEL MENÚ PRINCIPAL DE L'APLICACIÓ D'ACCÉS A BASES DE DADES LDAP
	</title>

	<link rel="stylesheet" type="text/css" href="css.css">
</head>

<body>
	<h2> MENÚ PRINCIPAL DE L'APLICACIÓ D'ACCÉS A BASES DE DADES LDAP</h2>
	<a href="https://zend-rosaca.fjeclot.net/projFinal/consulta.php">Consultar Usuari</a> <br>
	<a href="https://zend-rosaca.fjeclot.net/projFinal/crea.html">Crear Usuari</a> <br>
	<a href="https://zend-rosaca.fjeclot.net/projFinal/edita.html">Editar Usuari</a> <br>
	<a href="https://zend-rosaca.fjeclot.net/projFinal/elimina.html">Eliminar Usuari</a> <br>
	<a href="https://zend-rosaca.fjeclot.net/projFinal/eliminaSysdev.html">Eliminar Sysdev</a> <br>
	<a href="https://zend-rosaca.fjeclot.net/projFinal/index.php">Torna a la pàgina inicial</a>
</body>

</html>