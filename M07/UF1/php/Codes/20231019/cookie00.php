<?php
// Treballant amb cookies. Debian 12 PHP 8.2.7 Apache 2.4.57 
// /etc/php/8.2/apache2/php.ini --> Línia 1390 --> session.use_cookies = 1 --> reinicia apache2
$nom_cookie = "pagina_visitada";
$valor_cookie = 1;
#
# CREACIÓ DE LA COOKIE
#
setcookie($nom_cookie, $valor_cookie, time() + (86400 * 30), "/"); // 86400 = 1 day; "/" is where the cookie will be valid, for the apps that are inside "/".
#
# setcookie --> Creació i modificació de cookies
# Ha de ser cridada abans de qualsevol HTML
# Una cookie s'envia en el header del missatge HTTP
# El header està abans que el body del missatge HTTP
# El codi HTML s'envia en el body del missatge HTTP	
#
# PROBLEMÀTICA --> S'actualitza la data d'expiració a cada visita. Això a vegades no és desitjable.
?>

<!DOCTYPE html>
<html lang="ca">

<head>
	<meta charset="utf-8">
	<title>Creant i accedint a Cookies - I</title>
</head>

<body>
	CREANT I ACCEDINT A COOKIES - I<br>

	<?php

	// isset is for searching if a cookie exists or not.
	if (!isset($_COOKIE[$nom_cookie])) echo "La cookie anomenada <b>" . $nom_cookie . "</b> encara no té una assignació<br>"; #Primera connexió.El client no té cap cookie emmagatzemada.
	else {
		echo "La cookie anomenada <b>" . $nom_cookie . "</b> té ara una assignació<br>";
		echo "El valor emmagatzemat és: " . $_COOKIE[$nom_cookie] . "<br>"; # A partir de la segona connexió, el client sí té una cookie emmagatzemada
	}
	?>
</body>

</html>