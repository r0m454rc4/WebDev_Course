<?php
define("VALOR_INICIAL", 1);
if (isset($_COOKIE['comptador'])) {
	if ($_GET['nom_usuari'] == $_COOKIE['nom_usuari']) {
		$comptador = $_COOKIE['comptador'] + 1;
		setcookie("comptador", $comptador, time() + 30, "/");
		//Les cookies són vàlides només 30 segons. Comprova el valor Expires/Max-Age
	}
} else {
	setcookie("nom_usuari", $_GET['nom_usuari'], time() + 30, "/");
	//Les cookies són vàlides només 30 segons. Comprova el valor Expires/Max-Age
	setcookie("comptador", VALOR_INICIAL, time() + 30, "/");
	//Les cookies són vàlides només 30 segons. Comprova el valor Expires/Max-Age
}
//NOTA IMPORTANT: Has d'esperar 30 segons després de recarregar pantalla per veure l'efecte	
?>
<html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Treballant amb cookies. Modificant Cookies - II</title>
</head>

<body>
	TREBALLLANT AMB COOKIES. MODIFICANT COOKIES - II<br>
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