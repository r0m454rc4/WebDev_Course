<?php
//Intent de creació de cookies utilitzant un domini que no és el del servidor
//Comprova que sempre surt el mateix missatge al navegador
//Comprova el missatge que dóna l'eina Consola de les eines de desenvolupador
//Comprova que no s'ha creat cap cookie a Emmagatzematge de les eines de desenvolupador 
$nom_cookie = "web_visitada";
$valor_cookie = 1;
setcookie($nom_cookie, $valor_cookie, time() + (86400 * 30), "/", "fje.edu");
?>
<!DOCTYPE html>
<html lang="ca">

<head>
	<meta charset="utf-8">
	<title>Intent de creació de cookies utilitzant un domini que no és el del servidor</title>
</head>

<body>
	INTENT DE CREACIÓ DE COOKIES UTILITZANT UN DOMINI QUE NO ÉS EL DEL SERVIDOR<br>
	<?php
	if (!isset($_COOKIE[$nom_cookie])) echo "La cookie anomenada " . $nom_cookie . " encara no té una assignació<br>";
	else {
		echo "La cookie anomenada " . $nom_cookie . " té ara una assignació<br>";
		echo "El valor emmagatzemat és: " . $_COOKIE[$nom_cookie] . "<br>";
	}
	?>
</body>

</html>