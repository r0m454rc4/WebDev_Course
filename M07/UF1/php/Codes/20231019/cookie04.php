<?php
//Per treballar amb les cookies de cookie02.php
//Per comprovar que s'han esborrat les cookies refresca (tanca i torna a obrir) la llista de cookies dins del navegador
if ($_GET['resp'] == "si") {
	echo "Hola00<br>";
	if (isset($_COOKIE['comptador'])) {
		setcookie("comptador", "", time() - 3600);
	}
	if (isset($_COOKIE['nom_usuari'])) {
		setcookie("nom_usuari", "", time() - 3600);
	}
}
?>
<html>

<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<title>Esborrant cookies</title>
</head>

<body>
	ESBORRANT COOKIES<br>
	<?php
	if ($_GET['resp'] == "si") {
		echo "Qualsevol cookie que hagués pogut ser creada per aquesta aplicació dins del teu navagador ha estat esborrada<br>";
	} else {
		echo "Qualsevol cookie que hagués pogut ser creada per aquesta aplicació dins del teu navagador encara existeix<br>";
	}
	date_default_timezone_set('Europe/Andorra');
	echo "Hora: " . date('d/m/Y h:i:s') . "<br>";
	?>
</body>

</html>