<?php
define("VALOR_INICIAL", 1);

if (isset($_COOKIE['comptador'])) {  // The second time, I'll get this, because I already have "comptador".
	if ($_GET['nom_usuari'] == $_COOKIE['nom_usuari']) {
		$comptador = $_COOKIE['comptador'] + 1;
		setcookie("comptador", $comptador, time() + (86400 * 30), "/");
	}
} else {  // On the beggining I'll go this way, because I don't have the cookie called "comptador".
	setcookie("nom_usuari", $_GET['nom_usuari'], time() + (86400 * 30), "/");
	setcookie("comptador", VALOR_INICIAL, time() + (86400 * 30), "/");
}
?>
<!DOCTYPE html>
<html lang="ca">

<head>
	<meta charset="utf-8">
	<title>Treballant amb cookies. Modificant Cookies - I</title>
</head>

<body>
	TREBALLLANT AMB COOKIES. MODIFICANT COOKIES - I<br>
	<?php
	if (isset($_COOKIE['comptador'])) {
		if ($_GET['nom_usuari'] != $_COOKIE['nom_usuari']) {
			echo "El nom d'usuari actual no coincideix amb el de la primera visita<br>";
		} else {
			echo "Hola " . $_GET['nom_usuari'] . "<br>";
			echo "És la teva visita número: " . $comptador . "<br>";
		}
	} else {
		echo "Hola " . $_GET['nom_usuari'] . "<br>";
		echo "Aquesta és la teva primera visita<br>";
	}
	date_default_timezone_set('Europe/Andorra');
	echo "Hora: " . date('d/m/Y h:i:s') . "<br>";
	?>
</body>

</html>