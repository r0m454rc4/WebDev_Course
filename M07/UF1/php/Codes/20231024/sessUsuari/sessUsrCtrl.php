<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ca">

<head>
	<meta charset="utf-8">
	<title>Treballant amb sessions d'usuari - Inici de sessió i manteniment de sessió</title>
</head>

<body>
	<b>Aplicació mínima de proves de funcionament de session d'usuari</b><br>
	<?php
	if (!isset($_SESSION['comptador'])) {
		$_SESSION['comptador'] = 1;
		echo "Primera visita a l'aplicació sessUsuari.php. Sessió d'usuari iniciada." . "<br>";
	} else {
		$_SESSION['comptador']++;
		echo "Sessió activa. Visita: " . $_SESSION['comptador'] . " a l'aplicació sessUsuari.php." . "<br>";
	}
	?>
	<a href="sessUsr.html">Torna a l'inici de l'aplicació</a><br>
	<a href="sessUsrDest.php">Finalitza sessió</a>
</body>

</html>