<?php
session_start(); // Inici de sessió

if ((isset($_POST['adm'])) && (isset($_POST['cts']))) {
	$_SESSION['adm'] = $_POST['adm'];
}
?>

<html>

<head>
	<title>
		Login
	</title>
</head>

<body>
	<form action="https://zend-rosaca.fjeclot.net/projFinal/auth.php" method="POST">
		Usuari amb permisos d'administració LDAP: <input type="text" name="adm"><br>
		Contrasenya de l'usuari: <input type="password" name="cts"><br>
		<input type="submit" value="Envia" />
		<input type="reset" value="Neteja" />
	</form>
</body>

</html>