<?php
session_start();
$sessio_destruida = false;
if (isset($_SESSION['comptador'])) {
	//Alliberant variables de sessió. Esborra el contingut de les variables de sessió del fitxer de sessió. Buida l'array $_SESSION. No esborra cookies
	session_unset();
	//Destrucció de la cookie de sessió dins del navegador
	$cookie_sessio = session_get_cookie_params();

	// foreach ($cookie_sessio as $key => $value) {
	// 	echo "$key ";
	// }

	setcookie("PHPSESSID", "", time() - 3600, $cookie_sessio['path'], $cookie_sessio['domain'], $cookie_sessio['secure'], $cookie_sessio['httponly']); //Neteja cookie de sessió
	//Destrucció de la informació de sessió (per exemple, el fitxer de sessió  o l'identificador de sessió) 
	session_destroy();
	$sessio_destruida = true;
}
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
	if ($sessio_destruida) {
		echo "Sessió finalitzada<br>";
	} else {
		echo "WARNING: La sessió no ha estat destruida<br>";
		echo "Probablament la sessió no havia estat iniciada<br>";
	}
	?>
	<a href="sessUsr.html">Torna a l'inici de l'aplicació</a>
</body>

</html>